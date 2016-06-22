<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::auth();
Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index');

Route::resource('products', 'ProductController');
Route::resource('categories', 'CategoryController');

Route::patch('products/picture/{productId}', [
    'uses' => 'ProductController@updatePicture',
    'as' => 'products.picture'
]);

Route::post('products/promo', [
    'uses' => 'ProductController@updatePromo',
    'as' => 'products.promo'
]);
