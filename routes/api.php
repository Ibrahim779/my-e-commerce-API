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
Route::namespace('Home\API')->group(function (){
     Route::apiResource('products','ProductController')->only(['index','show']);
     Route::name('products.')->prefix('products')->group(function (){
         Route::name('categories.')->prefix('categories')->group(function (){
             Route::get('{category}','ProductController@getCategoryProducts')->name('getCategoryProducts');
         });
     });
});
