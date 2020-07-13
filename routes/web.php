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

Route::namespace('Dashboard')->prefix('dashboard')->group(function (){
    Route::get('/','DashboardController@index')->name('dashboard.index');
    Route::resource('categories', 'CategoryController')->except('show');
    Route::name('products.')->prefix('products')->group(function (){
        Route::get('offers', 'ProductController@isOffer')->name('isOffer');
        Route::name('categories.')->prefix('categories')->group(function (){
            Route::get('{category}', 'ProductController@index')->name('index');
            Route::get('{category}/unpublished', 'ProductController@getUnPublished')->name('unPublished');
            Route::get('{category}/has-discount', 'ProductController@getHasDiscount')->name('hasDiscount');
            Route::post('{category}', 'ProductController@store')->name('store');
            Route::get('{category}/create', 'ProductController@create')->name('create');
            Route::get('{category}/edit/{product}', 'ProductController@edit')->name('edit');
            Route::patch('{category}/{product}', 'ProductController@update')->name('update');
            Route::get('{category}/destroy/{product}', 'ProductController@destroy')->name('destroy');
        });
    });
    Route::name('subcategories.')->prefix('subcategories')->group(function (){
        Route::name('categories.')->prefix('categories')->group(function (){
            Route::get('{category}', 'SubCategoryController@index')->name('index');
            Route::post('{category}', 'SubCategoryController@store')->name('store');
            Route::get('{category}/create', 'SubCategoryController@create')->name('create');
            Route::get('{category}/edit/{subcategory}', 'SubCategoryController@edit')->name('edit');
            Route::patch('{category}/{subcategory}', 'SubCategoryController@update')->name('update');
            Route::get('{category}/destroy/{subcategory}', 'SubCategoryController@destroy')->name('destroy');
        });
    });
    Route::get('coupons',function (){
        return 'welcome';
    })->name('coupons.index');

    Route::resource('brands', 'BrandController');
    Route::resource('sliders', 'SliderController');
    Route::resource('messages', 'MessageController')->only(['index','destroy']);
    Route::resource('users', 'UserController')->only(['index','destroy']);
    Route::resource('orders', 'OrderController')->only(['index','destroy']);

});
