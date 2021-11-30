<?php

use App\Http\Middleware\CheckAuthedOrNo;
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

Route::post('register', 'AuthController@register');

Route::middleware([CheckAuthedOrNo::class])->group(function(){

    Route::get('menu', 'MainController@search');
    Route::post('orderFood', 'MainController@orderFood');

});

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

    Route::post('login', [ 'as' => 'login', 'uses' =>'AuthController@login']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');

});


