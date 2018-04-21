<?php

namespace App\Http\Controllers;

use App\Base\Controllers\ApplicationController;
use App\Product;

class FrontController extends ApplicationController
{

    public function __construct()
    {
      parent::__construct();
    }

  /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index',compact('brands','categories','products','newArrivals','contents','settings','mostClicked','recommends'));
    }

    public function about(){
      $lastProducts = Product::orderBy('created_at', 'desc')->take(4)->get();
      return view ('pages.about.index', compact('lastProducts'));
    }

    public function termsofuse(){
      return view ('pages.termsofuse');
    }

}
