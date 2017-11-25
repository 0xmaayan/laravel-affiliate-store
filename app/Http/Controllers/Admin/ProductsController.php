<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Base\Controllers\AdminController;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class ProductsController extends AdminController
{
      /**
       * Create a new controller instance.
       *
       */
      public function __construct()
      {
        $this->middleware('auth');
      }

  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   * @return \Illuminate\Http\Response
   */
    public function index(Request $request)
    {
      $products =  Product::with('category')->select('products.*');;
      if ($request->ajax()){
        return Datatables::of($products)
          ->editColumn('link', function ($product){
            return '<a href="'.$product->link.'">Product Link</a>';
          })
          ->addColumn('action', function ($product){
            return '<a class="btn btn-sm btn-warning" href="'.route('products.edit',$product->id).'">Edit</a>
                    <a class="btn btn-sm btn-danger" href="'.route('products.destroy',$product->id).'">Delete</a>';
          })
          ->rawColumns(['link','action'])
          ->make(true);
      }

      return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_list = Category::pluck('name','id');

        return view('admin.products.create',compact('categories_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
        'image' => 'mimes:png,jpg,jpeg',
        'link' => 'required',
      ]);
      $data = [
        'name' => $request->name,
        'price' => $request->price,
        'link' => $this->handleLink($request->link),
        'main_image' => $this->getLinkImage(),
        'category_id' => $request->category_id
      ];

      if($request->file('main_image')){
        $data['main_image'] = $request->file('main_image')->getClientOriginalName();
        $request->image->move(public_path('/images/products'), $data['main_image']);
      }

      Category::create($data);

      return Redirect::route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categories_list = Category::pluck('name','id');
      $product = Product::findOrFail($id);
      return view('admin.products.edit',compact('product','categories_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::findOrFail($id);

      $product->delete();

      return redirect()->back();
    }

    /*
     * <a
     * href="https://www.amazon.com/Allied-Brad-Pitt/dp/B01N0AN2W6/ref=as_li_ss_il?_encoding=UTF8&pd_rd_i=B01N0AN2W6&pd_rd_r=ZT95X1G6K2Q7PMT6GG0W&pd_rd_w=UtSzk&pd_rd_wg=qP5M5&psc=1&refRID=AF3SS5GBFWW0VBKT3BSA&linkCode=li2&tag=lostinspace03-20&linkId=765c98dd4931a6341a5760da4f8adf31" target="_blank">
     * <img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B01N0AN2W6&Format=_SL160_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=lostinspace03-20">
     * </a>
     * <img src="https://ir-na.amazon-adsystem.com/e/ir?t=lostinspace03-20&l=li2&o=1&a=B01N0AN2W6" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
     *
     *
     *
     * <a
     * href="https://www.amazon.com/Allied-Brad-Pitt/dp/B01N0AN2W6/ref=as_li_ss_il?_encoding=UTF8&pd_rd_i=B01N0AN2W6&pd_rd_r=ZT95X1G6K2Q7PMT6GG0W&pd_rd_w=UtSzk&pd_rd_wg=qP5M5&psc=1&refRID=AF3SS5GBFWW0VBKT3BSA&linkCode=li2&tag=lostinspace03-20&linkId=765c98dd4931a6341a5760da4f8adf31" target="_blank">
     * </a>
     * <img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B01N0AN2W6&Format=_SL160_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=lostinspace03-20">
     *  */

    public function handleLink($link){
//      preg_match_all("/\<\w[^<>]*?\>([^<>]+?\<\/\w+?\>)?|\<\/\w+?\>/i", $link, $linkArray);
      $linkArray = preg_split("/[<>]+/", $link);
      dd($linkArray);
    }

    public function getLinkImage(){

    }
}
