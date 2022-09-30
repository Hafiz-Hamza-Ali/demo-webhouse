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
Route::get('/', 'App\Http\Controllers\HomeController@index');
// Route::get('/', function () {
//     return view('welcome');
// });
// Admin Routes WithOut Auth

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::view('/login', 'admin.auth.login')->name('login.form');
    Route::post('/login', 'UserController@login')->name('login');
    Route::view('/forgot-password', 'admin.auth.forgot_password')->name('forgot.password');
    Route::view('/reset-password', 'admin.auth.reset_password')->name('reset.password.form');
    Route::get('/logout', 'UserController@logout')->name('logout');
});

// Admin Routes With Auth
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::view('/', 'admin.pages.dashboard')->name('dashboard');
    Route::resource('/users', 'UserController');
    Route::resource('/menus', 'MenuController');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
