<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
  public function index(){
    $products = Product::all();
    return view('products.index',compact('products'));
  }


  public function trackClick($id){
    $product = Product::findOrFail($id);
    $product->increment('clicks');
    $product->update();
  }
}
