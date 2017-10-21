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

Route::get('posts/index', ['as' => 'posts.index', 'uses' => 'Api\PostController@index']);
Route::get('post/{id}', ['as' => 'post.show', 'uses' => 'Api\PostController@show']);

Route::get('/index', ['as' => 'traveller-inn-home', 'uses' => 'Api\HomeController@index']);
Route::post('search', ['as' => 'search', 'uses' => 'Api\HomeController@Search']);

// login and register routes
Route::post('getlogin','Api\LoginController@getlogin')->name('getlogin');
Route::post('getregister','Api\RegisterController@register')->name('getregister');

//forgot password routes
Route::post('password/email', 'Api\ForgotPasswordController@getResetToken');
Route::post('password/reset', 'Api\ResetPasswordController@reset');

//comment fetch route
Route::get('comment/{id}',  'Api\CommentController@getcomment');

//cotant vice post

Route::get('getcontantpost/{id}',  'Api\PostController@contantPost');

//slider route
Route::get('getslider/{id}',  'Api\PostController@getSlider');



Route::get('getSetting/{id}','Api\UserController@getSetting');

Route::Post('getuserprofile/{id}',  'Api\UserController@updatePersonal');