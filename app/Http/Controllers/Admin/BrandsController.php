<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BrandsController extends AdminController
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
      $brands = Brand::all();
      return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.brands.create');
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
        'image' => 'mimes:png,jpg,jpeg',
      ]);

      $data = [
        'name' => $request->name,
      ];

      if($request->file('image')){
        $data['image'] = $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('/images/brands'), $data['image']);
      }

      Brand::create($data);

      return Redirect::route('admin.brands.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
      $brand = Brand::findOrFail($id);

      return view('admin.brands.edit', compact('brand'));
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
        'image' => 'mimes:png,jpg,jpeg',
      ]);

      $data = [
        'name' => $request->name,
      ];

      if($request->file('image')){
        $data['image'] = $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('/images/brands'), $data['image']);
      }

      $brand = Brand::findOrFail($id);
      $brand->update($data);

      return Redirect::route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $brand = Brand::findOrFail($id);

      $brand->delete();

      return Redirect::route('admin.brands.index');
    }
}
