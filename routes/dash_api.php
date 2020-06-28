<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('Dashboard\API')->group(function (){
      Route::apiResource('categories', 'CategoryController')->except('show');
      Route::apiResource('products', 'ProductController')->only(['destroy', 'update']);
      Route::name('products.')->prefix('products')->group(function (){
          Route::name('categories.')->prefix('categories')->group(function (){
              Route::apiResource('{category}', 'ProductController')->only(['index', 'store']);
          });
          Route::get('not-allow', 'ProductController@getNotAllow')->name('notAllow');
          Route::get('has-discount', 'ProductController@getHasDiscount')->name('hasDiscount');
      });
      Route::name('subcategories.')->prefix('subcategories')->group(function (){
        Route::name('categories.')->prefix('categories')->group(function (){
            Route::apiresource('{category}', 'SubCategoryController')->only(['index', 'store']);
        });
      });
      Route::apiResource('subcategories', 'SubCategoryController')->only('destroy', 'update');
      Route::apiResource('brands', 'BrandController');
      Route::apiResource('sliders', 'SliderController');
      Route::apiResource('messages', 'MessageController')->only(['index','destroy']);
      Route::apiResource('users', 'UserController')->only(['index','destroy']);
      Route::apiResource('orders', 'OrderController')->only(['index','destroy']);
      Route::get('products-not-allow','StatisticController@productsNotAllow');
      Route::get('products-not-allow-count','StatisticController@productsNotAllowCount');
      Route::get('orders-outstanding','StatisticController@ordersOutstanding');
      Route::get('orders-outstanding-count','StatisticController@ordersOutstandingCount');
      Route::get('latest-messages','StatisticController@getLatestMessages');
      Route::get('messages-count','StatisticController@getMessagesCount');
});
