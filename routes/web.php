<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/menu', function () {
    return view('menu.view');
});

Route::get('/menu/view/{id}', function () {
    return view('menu.viewProduct');
});

Route::get('/about-us', function () {
    return view('user.about-us');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store'])->name('guest.RegisterData');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'check'])->name('guest.LoginData');;
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/cart', function () {
        return view('user.cart');
    });

    Route::get('/profile', function () {
        return view('user.profile');
    });

    Route::get('/order', function () {
        return view('user.order');
    });

    Route::middleware(['role:user'])->group(function () {
    });
    Route::middleware(['role:admin'])->group(function () {
    });
});
