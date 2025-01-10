<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;


/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute utama
Route::get('/', function () {
    return view('welcome');
});

// Rute about
Route::get('/about', function () {
    return view('about');  // Pastikan Anda punya file 'about.blade.php' di folder resources/views
})->name('about');

// Rute autentikasi
Auth::routes();

// Rute untuk halaman beranda setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rute untuk artikel, hanya dapat diakses oleh pengguna yang sudah login
Route::middleware('auth')->group(function () {
    // Rute CRUD untuk artikel
    Route::resource('articles', ArticleController::class);

    // Rute CRUD untuk kategori buku
    Route::resource('categories', CategoryController::class);

    // Rute CRUD untuk buku, dengan relasi ke kategori
    Route::resource('books', BookController::class);
});


