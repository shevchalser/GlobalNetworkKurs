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

Route::get('/home', 'App\Http\Controllers\MainController@home')->name("home");
Route::get('/about', 'App\Http\Controllers\MainController@about')->name('about');

Route::middleware('auth')->group(function(){
    Route::get('/logout', 'App\Http\Controllers\MainController@logout')->name('logout');
    Route::get('/workout/{id}', 'App\Http\Controllers\MainController@workout')->name("workout");
    Route::get('/workoutadd', 'App\Http\Controllers\MainController@workoutadd')->name("workoutadd");
    Route::get('/workoutaddone/{id}', 'App\Http\Controllers\MainController@workoutaddone')->name("workoutaddone");
    Route::post('/workoutadd_proc/{id}', 'App\Http\Controllers\MainController@workoutadd_proc')->name("workoutadd_proc");
    Route::get('/workoutaddvar/{id}', 'App\Http\Controllers\MainController@workoutaddvar')->name("workoutaddvar");
    Route::post('/woAddVars/{woid}', 'App\Http\Controllers\MainController@woAddVars')->name("woAddVars");
});

Route::middleware('guest')->group(function(){
    Route::get('/reg', 'App\Http\Controllers\MainController@reg')->name("reg");
    Route::post('/register_proc','App\Http\Controllers\MainController@register_proc')->name("register_proc");
    Route::get('/login', 'App\Http\Controllers\MainController@login')->name('login');
    Route::post('/login_proc','App\Http\Controllers\MainController@login_proc')->name("login_proc");
});
/*
Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'ID: '. $id.'. Name: ' .$name;
});
*/

