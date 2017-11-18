<?php

namespace App\Http\Controllers;

use App\Category;
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
        $categories = Category::take(3)->get();

        return view('index',compact('categories'));
    }
}
