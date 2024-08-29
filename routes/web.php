<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;

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

Route::view('login', 'Auth.Login')->name('login')->middleware('guest');
Route::post('login', [Login::class, 'login']);

Route::view('register', 'Auth.Register')->name('register');
Route::post('register', [Register::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::view('admin.dashboard', 'Admin.Dashboard')->name('admin.dashboard');
    Route::get('logout', [Logout::class, 'logout'])->name('logout');
});

