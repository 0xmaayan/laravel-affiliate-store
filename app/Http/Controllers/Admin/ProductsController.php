<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Base\Controllers\AdminController;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use Sunra\PhpSimple\HtmlDomParser;

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
      $products =  Product::with('brands','category')->select('products.*');
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
        $brands_list = Brand::pluck('name','id');

        return view('admin.products.create',compact('categories_list','brands_list'));
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

      $linksArray = $this->returnArrayOfAmazonLinks($request->link);

      $data = [
        'name' => $request->name,
        'price' => $request->price,
        'link' => $linksArray['value'], // the href attribute value
        'main_image' =>$linksArray['src'][0], // the img src
        'category_id' => $request->category_id,
        'brands_id' => $request->brand_id
      ];

      if($request->file('main_image')){
        $data['main_image'] = $request->file('main_image')->getClientOriginalName();
        $request->image->move(public_path('/images/products'), $data['main_image']);
      }

      Product::create($data);

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
      $brands_list = Brand::pluck('name','id');
      $product = Product::findOrFail($id);
      return view('admin.products.edit',compact('product','categories_list','brands_list'));
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

      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
        'image' => 'mimes:png,jpg,jpeg',
        'link' => 'required',
      ]);

      $linksArray = $this->returnArrayOfAmazonLinks($request->link);

      $data = [
        'name' => $request->name,
        'price' => $request->price,
        'link' => $linksArray['value'], // the href attribute value
        'main_image' =>$linksArray['src'][0], // the img src
        'category_id' => $request->category_id,
        'brands_id' => $request->brand_id
      ];

      if($request->file('main_image')){
        $data['main_image'] = $request->file('main_image')->getClientOriginalName();
        $request->image->move(public_path('/images/products'), $data['main_image']);
      }

      $product = Product::findOrFail($id);
      $product->update($data);

      return Redirect::route('products.index');
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

    public function returnArrayOfAmazonLinks($fullLink){

      $dom = HtmlDomParser::str_get_html( $fullLink );
      $data = [];
      $aElement = $dom->find('a');
      foreach($aElement as $href){
        $data['value'] = $href->href;
      }

      $imgElement = $dom->find('img');
      foreach($imgElement as $img){
        $data['src'][] = $img->src;
      }

      return $data;
    }
}
