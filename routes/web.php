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

/*Route::group(['domain' => "lostinspace.co"], function()
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
});*/

/*Route::get('/mailable', function () {
  $subscribe = App\Subscribe::find(1);

  return new App\Mail\NewSubscribe($subscribe);
});*/

Auth::routes();


Route::get('/', 'FrontController@index');
Route::get('about-us',['as' => 'about', 'uses' => 'FrontController@about']);

Route::get('terms-of-use', 'FrontController@termsofuse');

Route::get('products',['as' => 'products', 'uses' => 'ProductsController@index']);
Route::post('product/{id}/click', 'ProductsController@trackClick');

Route::get('categories',['as' => 'categories', 'uses' => 'CategoriesController@index']);

Route::get('brands',['as' => 'brands', 'uses' => 'BrandsController@index']);
Route::get('brands/{brandSlug}',['as' => 'brand', 'uses' => 'BrandsController@show']);

Route::get('{categorySlug}','CategoriesController@show');


