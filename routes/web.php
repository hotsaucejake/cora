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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Route::group(['prefix' => 'test'], function() {
    Route::get('/jokes',  'TestController@jokes');
 });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('auth/azure', ['as' => 'auth/azure', 'uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('auth/azure/callback', ['as' => 'auth/azure/callback', 'uses' => 'Auth\LoginController@handleProviderCallback']);

Route::get('/login', 'Auth\LoginController@redirectToProvider')->name('login');

Route::group(['prefix' => 'exchanges'], function () {
    Route::get('/nexmo',         'ExchangesController@nexmo');
    Route::get('/skype',         'ExchangesController@skype');
    Route::get('/spark',         'ExchangesController@spark');
    Route::get('/teams',         'ExchangesController@teams');
});