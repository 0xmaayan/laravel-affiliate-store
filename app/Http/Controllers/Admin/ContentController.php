<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use Illuminate\Http\Request;

class ContentController extends AdminController
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
        return view('admin.content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        'brand_id' => $request->brand_id
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
      return view('admin.content.edit');
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
        'brand_id' => $request->brand_id
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

    }

}
