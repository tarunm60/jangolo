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
Route::get('/products/{status?}','ProductsController@index');
Route::get('/products/{product}','ProductsController@show');
Route::get('/homeproducts','ProductsController@homeproducts');

Route::get('/newsletters/subscribe/{user}/{newsletter}','NewslettersController@subscribe');
Route::get('/newsletters/unsubscribe/{user}/{newsletter}','NewslettersController@unsubscribe');

Route::get('/users','UsersController@index');
Route::get('/users/{user}','UsersController@show');
//Route::get('/users/delete/{user}','UsersController@destroy');

Route::get('/users/search/{search}','UsersController@searchs');
Route::get('/users/create/{email}','UsersController@createwithemail');
//Route::post('/users/search',array('as' => 'search', 'uses' => 'UsersController@search'));
Route::post('/users/signin',array('as' => 'signin', 'uses' => 'AuthController@signin'));
Route::post('/users/create',array('as' => 'store', 'uses' => 'AuthController@store'));


Route::get('/articles','ArticleController@index');
Route::get('/articles/{article}','ArticleController@show');