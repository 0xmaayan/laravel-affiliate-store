<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Product;
use App\Subscribe;

class DashboardController extends AdminController {

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $subscribers = Subscribe::all();
    $mostClicked = Product::orderBy('clicks', 'desc')->first();

    return view('admin.dashboard', compact('subscribers', 'mostClicked'));
  }
}
