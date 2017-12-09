<?php

namespace App\Http\Controllers;

use App\Base\Controllers\ApplicationController;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends ApplicationController
{
    public function index(){
      return view('pages.categories.index',compact('categories'));
    }

    public function show(Category $category){
      $products = $category->products()->get();
      return view('pages.categories.show',compact('products','category'));
    }
}
