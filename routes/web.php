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
        });
      });
      Route::get('contact', 'ContactController@index')->name('contact.index');
      Route::get('about', 'AboutController@index')->name('about.index');
      Route::get('cart', 'CartController@index')->name('cart.index');
      Route::get('wishlist', 'WishlistController@index')->name('wishlist.index');
      Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
});
