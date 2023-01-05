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
    return view('user.home');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/menu', function () {
    return view('menu.view');
});

Route::get('/order', function () {
    return view('user.order');
});

Route::get('/about-us', function () {
    return view('user.about-us');
});

Route::get('/cart', function () {
    return view('user.cart');
});

Route::get('/history', function () {
    return view('user.history');
});

Route::get('/profile', function () {
    return view('user.profile');
});
