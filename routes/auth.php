<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "auth" middleware group. Now create something great!
|

*/


// Authentication Routes...
Route::get('login', ['as' => 'auth.login', 'uses' => 'LoginController@showLoginForm']);
Route::post('login', ['as' => 'auth.login.post', 'uses' => 'LoginController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'LoginController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'auth.register', 'uses' => 'RegisterController@showRegistrationForm']);
Route::post('register', ['as' => 'auth.register.post', 'uses' => 'RegisterController@register']);

// Password Reset Routes...
Route::get('password/reset', ['as' => 'password.resetLink', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'ResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'password.request', 'uses' => 'ResetPasswordController@reset']);

