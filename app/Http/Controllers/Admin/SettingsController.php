<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends AdminController
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
      $settings = Setting::all();

      return view('admin.settings.index',compact('settings'));
    }
}
