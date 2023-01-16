<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/category/{id}', [MenuController::class, 'indexCategory']);

Route::get('/menu/category/', function () {
    return redirect('/menu');
});

Route::get('/menu/view/{id}', [MenuController::class, 'indexMenu']);

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

    Route::get('/profile', [UserController::class, 'index']);
    Route::post('/profile/update/image', [UserController::class, 'updateImage'])->name('user.updateImage');
    Route::post('/profile/update/info', [UserController::class, 'updateInfo'])->name('user.updateInfo');
    Route::post('/profile/update/password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

    Route::get('/order', function () {
        return view('user.order');
    });

    Route::middleware(['role:user'])->group(function () {
        Route::get('/cart', function () {
            return view('user.cart');
        });
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/menu/add', [MenuController::class, 'addIndex']);
        Route::post('/menu/add', [MenuController::class, 'addAction'])->name('admin.addMenu');

        Route::get('/menu/{id}/update', [MenuController::class, 'updateIndex']);
        Route::post('/menu/{id}/update', [MenuController::class, 'updateAction'])->name('admin.updateMenu');

        Route::delete('/menu/{id}/delete', [MenuController::class, 'deleteAction'])->name('admin.deleteMenu');
    });
});
