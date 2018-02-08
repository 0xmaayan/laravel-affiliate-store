<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\User;
use Illuminate\Http\Request;

class UsersController extends AdminController
{
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
