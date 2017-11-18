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
      dd($request);
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
}
