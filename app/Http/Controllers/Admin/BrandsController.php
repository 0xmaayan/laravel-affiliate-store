<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Brand;
use Illuminate\Http\Request;

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

    public function index(){
      $brands = Brand::all();
      return view('admin.brands.index',compact('brands'));
    }
}
