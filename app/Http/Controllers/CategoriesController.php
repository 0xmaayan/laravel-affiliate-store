<?php

namespace App\Http\Controllers;

use App\Base\Controllers\ApplicationController;
use Illuminate\Http\Request;

class CategoriesController extends ApplicationController
{
    public function index(){
      return view('pages.categories.index',compact('categories'));
    }
}
