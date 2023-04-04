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
    return view('auth/login');
});

Auth::routes();

Route::resource('/article', App\Http\Controllers\Web\ArticleController::class);

Route::get('/web/article/home', [App\Http\Controllers\Web\ArticleController::class, 'index'])->name('home');

// Route::resource('/home', App\Http\Controllers\HomeController::class);
Route::get('/profile', [App\Http\Controllers\Web\ProfileController::class, 'profile'])->name('profile');

