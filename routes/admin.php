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

Route::get('/', ['as' => 'admin', 'uses' => 'DashboardController@index']);
//Route::get('/admin/categories', ['as' => 'admin.categories', 'uses' => 'CategoriesController@index']);
Route::get('/users', ['as' => 'users', 'uses' => 'UsersController@index']);
Route::get('/settings', ['as' => 'settings', 'uses' => 'SettingsController@index']);
Route::post('/settings', ['as' => 'settings.update', 'uses' => 'SettingsController@update']);

Route::resource('categories','CategoriesController');
Route::resource('products','ProductsController');
Route::resource('content','ContentController');
Route::resource('brands','BrandsController');

