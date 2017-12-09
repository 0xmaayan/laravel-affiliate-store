<?php

namespace App\Http\Controllers;

use App\Base\Controllers\ApplicationController;
use App\Brand;
use Illuminate\Http\Request;

class BrandsController extends ApplicationController
{
    public function __construct()
    {
      parent::__construct();
    }

    public function index(){
      dd('here');
      return view('pages.brands.index');
    }

    public function show(Brand $brand){
      $products = $brand->products()->get();
      return view('pages.brands.show',compact('products','brand'));
    }
}
