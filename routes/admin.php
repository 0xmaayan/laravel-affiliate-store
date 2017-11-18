<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|

*/
Route::get("/email", function() {
  Mail::raw('Now I know how to send emails with Laravel', function($message)
  {
    $message->subject('Hi There!!');
    $message->from(config('mail.from.address'), config("app.name"));
    $message->to('maayansavir@gmail.com');
  });
});

Route::get('/admin', ['as' => 'admin', 'uses' => 'DashboardController@index']);
//Route::get('/admin/categories', ['as' => 'admin.categories', 'uses' => 'CategoriesController@index']);
Route::get('/admin/users', ['as' => 'admin.users', 'uses' => 'UsersController@index']);
Route::get('/admin/settings', ['as' => 'admin.settings', 'uses' => 'SettingsController@index']);

Route::resource('categories','CategoriesController');
Route::resource('products','ProductsController');

