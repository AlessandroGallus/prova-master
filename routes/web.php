<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('guest.index');
});

Auth::routes();


Route::get('/dashboard', 'HomeController@index')->name('home');
/* Route::delete('/dashboard/{user}','Admin\UserController@destroy')->middleware('auth')->name('user.destroy'); */
Route::namespace('Admin')
    ->middleware('auth')
    ->group(function(){
        Route::resource('/user','UserController');
        Route::resource('/dashboard/messages','MessageController');
    });

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/dashboard/messages', 'HomeController@messages')->name('messages');
Route::get('/dashboard/reviews', 'HomeController@reviews')->name('messages');
Route::delete('/dashboard/{user}','Admin\UserController@destroy')->middleware('auth')->name('user.destroy');
Route::get('{any?}', 'PageController@index')->where('any','.*');
