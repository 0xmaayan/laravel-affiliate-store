<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Requests\Admin\SettingsRequest;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends AdminController {
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $settings = Setting::firstOrCreate(['id' => 1]);

    return view('admin.settings.index', compact('settings'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param SettingsRequest|Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(SettingsRequest $request)
  {

    $data = [
      'title'           => $request->title,
      'seo_description' => $request->seo_description,
      'seo_keywords'    => $request->seo_keywords,
      'email'           => $request->email,
      'instagram'       => $request->instagram,
      'pinterest'       => $request->pinterest,
    ];

    if ($request->file('logo'))
    {
      $data['logo'] = $request->file('logo')->getClientOriginalName();
      $request->logo->move(public_path('/uploads/logo'), $data['logo']);
    }

    Setting::updateOrCreate(['id' => 1], $data);

    return Redirect::route('admin.settings');
  }
}
