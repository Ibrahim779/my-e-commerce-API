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
use Illuminate\Support\Facades\Route;

Route::namespace('Home')->group(function (){
      Route::get('/','HomeController@index')->name('home.index');
      Route::post('subscribes', 'SubscribeController@store')->name('subscribes.store');
      Route::name('products.')->prefix('products')->group(function (){
        Route::get('/','ProductController@index')->name('index');
          Route::get('{product}','ProductController@show')->name('show');
        Route::name('categories.')->prefix('categories')->group(function () {
            Route::get('{category}', 'ProductController@getCategoryProducts')->name('getCategoryProducts');
            Route::get('{category}/subcategory/{subcategory}', 'ProductController@getSubcategoryProducts')->name('getSubcategoryProducts');
            Route::get('{category}/brand/{brand}', 'ProductController@getCategoryBrandProducts')->name('getCategoryBrandProducts');
        });
        Route::get('brand/{brand}', 'ProductController@getBrandProducts')->name('getBrandProducts');
      });
      Route::resource('contact', 'ContactController')->only(['index', 'store']);
      Route::get('about', 'AboutController@index')->name('about.index');
      Route::get('cart', 'CartController@index')->name('cart.index');
      Route::resource('wishlist', 'WishlistController')->only(['index', 'destroy']);
      Route::get('wishlist/{product}', 'WishlistController@store')->name('wishlist.store');
      Route::resource('cart', 'CartController')->only(['index', 'destroy']);
      Route::get('cart/{product}', 'CartController@store')->name('cart.store');
      Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
      Route::get('search','ProductController@search')->name('search');

});
