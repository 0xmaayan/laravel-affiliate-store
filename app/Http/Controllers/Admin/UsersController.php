<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\User;
use Illuminate\Http\Request;

class UsersController extends AdminController
{
  /**
   * Create a new controller instance.
   *
   */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();

      return view('admin.users',compact('users'));
    }
}
