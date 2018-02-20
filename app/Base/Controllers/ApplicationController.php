<?php

namespace App\Base\Controllers;

use App\Http\Controllers\Controller;
use App\Brand;
use App\Category;
use App\Content;
use App\Product;
use App\Setting;
use Illuminate\Support\Facades\Storage;

abstract class ApplicationController extends Controller
{
    protected $contents;
    protected $brands;
    protected $categories;
    protected $products;
    protected $newArrivals;
    protected $mostClicked;
    protected $recommends;
    protected $settings;


    public function __construct()
    {
      $this->settings = Setting::all()->first();
      $this->contents = Content::all();
      $this->brands = Brand::all();
      $this->categories = Category::all();
      $this->products = Product::all()->shuffle();
      $this->newArrivals = Product::orderBy('created_at', 'desc')->take(3)->get();
      $this->mostClicked = Product::orderBy('clicks', 'desc')->take(3)->get();
      $this->recommends = Product::inRandomOrder()->take(3)->get();

      view()->share('contents', $this->contents);
      view()->share('brands', $this->brands);
      view()->share('products', $this->products);
      view()->share('categories', $this->categories);
      view()->share('newArrivals', $this->newArrivals);
      view()->share('mostClicked', $this->mostClicked);
      view()->share('recommends', $this->recommends);
      view()->share('settings', $this->settings);
    }

}
