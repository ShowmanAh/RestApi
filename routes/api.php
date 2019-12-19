<?php

use Illuminate\Http\Request;

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
//Authenticate route
Route::post('register','AuthController@register');
Route::post('login','AuthController@login');
Route::post('password/email','ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset','ResetPasswordController@reset');
//Task Route
// use route:post becouse method put|patch not post so user this route to make method post
Route::get('posts','PostController@index')->middleware('auth:api');
Route::get('posts/{id}','PostController@show')->middleware('auth:api');
Route::post('posts','PostController@store')->middleware('auth:api');
Route::post('posts/{id}','PostController@update')->middleware('auth:api');
Route::get('posts/delete/{id}','PostController@destroy')->middleware('auth:api');
//Route::resource('posts', 'PostController')->middleware('auth:api');
Route::resource('tasks', 'TaskController')->middleware('auth:api');
/**


//Route::resource('posts', 'PostController');
Route::get('posts','PostController@index')->middleware('auth:api');
Route::get('posts/{id}','PostController@show');
Route::post('posts','PostController@store');
Route::post('posts/{id}','PostController@update');
Route::get('posts/delete/{id}','PostController@destroy');
Route::resource('products', 'ProductController');
Route::prefix('products')->group(function(){
    Route::resource('/{product}/reviews', 'ReviewController');
});
 * */


