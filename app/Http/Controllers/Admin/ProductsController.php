<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Base\Controllers\AdminController;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
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
      $products =  Product::orderBy('clicks', 'desc')->with('brands','category')->select('products.*');
      if ($request->ajax()){
        return Datatables::of($products)
          ->editColumn('link', function ($product){
            return '<a href="'.$product->link.'">Product Link</a>';
          })
          ->addColumn('action', function ($product){
            return view('admin.products.actions.action', compact('product'));
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
   * @param ProductRequest|Request $request
   * @return \Illuminate\Http\Response
   */
    public function store(ProductRequest $request)
    {

      $data = [
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'brands_id' => $request->brands_id
      ];

      $product = Product::create($data);

      $public_dir = public_path('uploads/products/'.$product->id.'/');
      if (!file_exists($public_dir)) {
        mkdir($public_dir, 0777, true);
      }

      if(isset($request->affiliate_link)){
        $linksArray = $this->returnArrayOfAmazonLinks($request->affiliate_link);
        $data['link'] = $linksArray['value']; // the href attribute value
        $data['main_image'] = $linksArray['src'][0]; // the img src
        $data['type'] = 'affiliate';
      }

      if($request->file('main_image')){
        $img = Image::make($request->file('main_image'))
          ->fit(220, 280,function ($constraint) {
            $constraint->upsize();
          });
        $data['main_image'] = env('APP_URL').'/uploads/products/'.$product->id.'/'.$img->basename.'.jpg';
        $img->save($public_dir.$img->basename.'.jpg',60);
      }

      if(isset($request->link)){
        $data['link'] = $request->link;
        $data['type'] = 'personal';
      }

      $product->update($data);

      return Redirect::route('admin.products.index');
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
   * @param ProductRequest|Request $request
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
    public function update(ProductRequest $request, $id)
    {

      $data = [
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'brands_id' => $request->brand_id
      ];

      $public_dir = public_path('uploads/products/'.$id.'/');
      if (!file_exists($public_dir)) {
        mkdir($public_dir, 0777, true);
      }

      if(isset($request->affiliate_link)){
        $linksArray = $this->returnArrayOfAmazonLinks($request->affiliate_link);
        if(isset($linksArray['value'])){
          $data['link'] = $linksArray['value']; // the href attribute value
          $data['main_image'] = $linksArray['src'][0]; // the img src
          $data['type'] = 'affiliate';
        }
      }

      if($request->file('main_image')){
        $img = Image::make($request->file('main_image'))
          ->fit(220, 280,function ($constraint) {
          $constraint->upsize();
        });
        $data['main_image'] = env('APP_URL').'/uploads/products/'.$id.'/'.$img->basename.'.jpg';
        $img->save($public_dir.$img->basename.'.jpg',60);
      }

      if(isset($request->link)){
        $data['link'] = $request->link;
        $data['type'] = 'personal';
      }

      $product = Product::findOrFail($id);
      $product->update($data);

      return redirect()->back();
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
      if($aElement){
        foreach($aElement as $href){
          if(isset($href->href)){
            $data['value'] = $href->href;
          }
        }

        $imgElement = $dom->find('img');
        foreach($imgElement as $img){
          if(isset($img->src)){
            $data['src'][] = $img->src;
          }
        }

        return $data;
      }else{
        return $fullLink;
      }
    }
}
