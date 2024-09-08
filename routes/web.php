<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Admin\Categories;

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

    Route::prefix('admin')->group(function () {
        Route::view('dashboard', 'Admin.Dashboard');

        // Categories
        Route::view('create-category', 'Admin.Categories.Create-category')->name('create-category');
        Route::post('create-category', [Categories::class, 'create'])->name('create-category');
        Route::get('list-categories', [Categories::class, 'listCategories'])->name('list-categories');
        Route::get('show-category/{id}', [Categories::class, 'showCategory'])->name('show-category');
        Route::post('update-category/{id}', [Categories::class, 'updateCategory'])->name('update-category');
        Route::delete('delete-category/{id}', [Categories::class, 'deleteCategory'])->name('delete-category');
    });

    Route::get('logout', [Logout::class, 'logout'])->name('logout');
});

