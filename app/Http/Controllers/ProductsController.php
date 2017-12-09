<?php

namespace App\Http\Controllers;

use App\Base\Controllers\ApplicationController;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends ApplicationController
{
  public function __construct()
  {
    parent::__construct();
  }


  public function index(){
    return view('pages.products.index',compact('products'));
  }


  public function trackClick($id){
    $product = Product::findOrFail($id);
    $product->increment('clicks');
    $product->update();
  }
}
