<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Content;
use App\Product;
use App\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::all();
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::all();
        $newArrivals = Product::orderBy('created_at', 'desc')->take(3)->get();
        $settings = Setting::all();

        return view('index',compact('brands','categories','products','newArrivals','contents','settings'));
    }
}
