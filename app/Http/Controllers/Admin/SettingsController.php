<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends AdminController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $settings = Setting::firstOrCreate(['id' => 1]);

      return view('admin.settings.index',compact('settings'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $validatedData = $request->validate([
        'logo' => 'mimes:png,jpg,jpeg|nullable',
        'title' => 'max:255|nullable',
        'seo_description' => 'max:255|nullable',
        'seo_keywords' => 'max:255|nullable',
        'email' => 'email|nullable',
        'instagram' => 'max:255|nullable',
        'pinterest' => 'max:255|nullable',
      ]);

      $data = [
        'title' => $request->title,
        'seo_description' => $request->seo_description,
        'seo_keywords' => $request->seo_keywords,
        'email' => $request->email,
        'instagram' => $request->instagram,
        'pinterest' => $request->pinterest,
      ];

      if($request->file('logo')){
        $data['logo'] = $request->file('logo')->getClientOriginalName();
        $request->logo->move(public_path('/uploads/logo'), $data['logo']);
      }

      Setting::updateOrCreate(['id' => 1],$data);

      return Redirect::route('admin.settings');
    }
}
