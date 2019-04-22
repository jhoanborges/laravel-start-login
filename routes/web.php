+<?php

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



Auth::routes();
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

    //Route::middleware( 'role:precalificador|admin')->group(function () {

Route::group(['middleware' => ['auth']], function () {

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'WelcomeController@index')->name('home');

});
