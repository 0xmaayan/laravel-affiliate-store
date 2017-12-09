<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['domain' => "lostinspace.co"], function()
{
  Route::get('/', function () {
    return view('welcome');
  });
});
Route::group(['domain' => "www.lostinspace.co"], function()
{
  Route::get('/', function () {
    return view('welcome');
  });
});

Route::get('/', 'FrontController@index');
Route::get('about-us',['as' => 'about', 'uses' => 'FrontController@about']);


Route::get("/email", function() {
  Mail::raw('Now I know how to send emails with Laravel', function($message)
  {
    $message->subject('Hi There!!');
    $message->from(config('mail.from.address'), config("app.name"));
    $message->to('maayansavir@gmail.com');
  });
});

Auth::routes();

Route::get('products',['as' => 'products', 'uses' => 'ProductsController@index']);
Route::post('product/{id}/click', 'ProductsController@trackClick');

Route::get('categories',['as' => 'categories', 'uses' => 'CategoriesController@index']);

