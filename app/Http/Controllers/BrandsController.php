<?php

namespace App\Http\Controllers;

use App\Base\Controllers\ApplicationController;
use Illuminate\Http\Request;

class BrandsController extends ApplicationController
{
    public function __construct()
    {
      parent::__construct();
    }

    public function index(){
      return view('pages.brands.index');
    }
}
