<?php

namespace App\Http\Controllers;

use App\Base\Controllers\ApplicationController;

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
      return view ('pages.about.index');
    }

}
