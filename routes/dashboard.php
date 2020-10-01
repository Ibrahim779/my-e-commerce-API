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

Route::namespace('Dashboard')->prefix('dashboard')->middleware('admin')->group(function (){
    Route::get('/','DashboardController@index')->name('dashboard.index');
    Route::resource('categories', 'CategoryController')->except(['show']);
    Route::name('products.')->prefix('products')->group(function (){
        Route::name('categories.')->prefix('categories')->group(function (){
            Route::get('{category}', 'ProductController@index')->name('index');
            Route::get('{category}/unpublished', 'ProductController@getUnPublished')->name('unPublished');
            Route::get('{category}/has-discount', 'ProductController@getHasDiscount')->name('hasDiscount');
            Route::post('{category}', 'ProductController@store')->name('store');
            Route::get('{category}/create', 'ProductController@create')->name('create');
            Route::get('{category}/edit/{product}', 'ProductController@edit')->name('edit');
            Route::patch('{category}/{product}', 'ProductController@update')->name('update');
            Route::delete('{category}/products/{product}', 'ProductController@destroy')->name('destroy');
        });
        Route::get('{product}/published', 'ProductController@published')->name('published');
        Route::get('{product}/remove-discount', 'ProductController@removeDiscount')->name('removeDiscount');
        Route::patch('{product}/update-count', 'ProductController@updateCount')->name('updateCount');
        Route::delete('{product}', 'ProductController@destroy')->name('destroy');
    });
    Route::name('subcategories.')->prefix('subcategories')->group(function (){
        Route::name('categories.')->prefix('categories')->group(function (){
            Route::get('{category}', 'SubCategoryController@index')->name('index');
            Route::post('{category}', 'SubCategoryController@store')->name('store');
            Route::get('{category}/create', 'SubCategoryController@create')->name('create');
            Route::get('{category}/edit/{subcategory}', 'SubCategoryController@edit')->name('edit');
            Route::patch('{category}/{subcategory}', 'SubCategoryController@update')->name('update');
        });
        Route::delete('{subcategory}', 'SubCategoryController@destroy')->name('destroy');
    });
    Route::resource('brands', 'BrandController');
    Route::resource('sliders', 'SliderController');
    Route::resource('messages', 'MessageController')->only(['index','destroy']);
    Route::resource('users', 'UserController')->middleware('owner');
    Route::resource('orders', 'OrderController')->except(['create','store']);
    Route::get('orders/status/completed','OrderController@completed')->name('orders.completed');
    Route::resource('subscribes', 'SubscribeController')->only(['index', 'destroy']);
    Route::resource('cities', 'CityController');
    Route::resource('coupons', 'CouponController');
    Route::resource('settings', 'SettingController');
});
