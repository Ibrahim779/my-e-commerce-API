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

Route::namespace('Dashboard')->group(function (){
    Route::get('/','DashboardController@index');
    Route::resource('categories', 'CategoryController')->except('show');
    Route::resource('products', 'ProductController')->only(['destroy', 'update']);
    Route::name('products.')->prefix('products')->group(function (){
        Route::name('categories.')->prefix('categories')->group(function (){
            Route::resource('{category}', 'ProductController')->only(['index', 'store']);
        });
        Route::get('not-allow', 'ProductController@getNotAllow')->name('notAllow');
        Route::get('has-discount', 'ProductController@getHasDiscount')->name('hasDiscount');
    });
    Route::name('subcategories.')->prefix('subcategories')->group(function (){
        Route::name('categories.')->prefix('categories')->group(function (){
            Route::resource('{category}', 'SubCategoryController')->only(['index', 'store']);
        });
    });
    Route::resource('subcategories', 'SubCategoryController')->only('destroy', 'update');
    Route::resource('brands', 'BrandController');
    Route::resource('sliders', 'SliderController');
    Route::resource('messages', 'MessageController')->only(['index','destroy']);
    Route::resource('users', 'UserController')->only(['index','destroy']);
    Route::resource('orders', 'OrderController')->only(['index','destroy']);
    Route::get('products-not-allow','StatisticController@productsNotAllow');
    Route::get('products-not-allow-count','StatisticController@productsNotAllowCount');
    Route::get('orders-outstanding','StatisticController@ordersOutstanding');
    Route::get('orders-outstanding-count','StatisticController@ordersOutstandingCount');
    Route::get('latest-messages','StatisticController@getLatestMessages');
    Route::get('messages-count','StatisticController@getMessagesCount');

});
