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

use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;

// Route untuk menampilkan daftar buku
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Route untuk menampilkan formulir tambah buku
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// Route untuk menyimpan buku baru
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Route untuk menampilkan informasi buku berdasarkan ID
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Route untuk menampilkan formulir edit buku berdasarkan ID
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

// Route untuk mengupdate buku berdasarkan ID
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

// Route untuk menghapus buku berdasarkan ID
Route::delete('/books/{book_id}', [BookController::class, 'destroy'])->name('books.destroy');


// MEMBERS ROUTE
// Route untuk menampilkan daftar buku
Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/{id}', [MemberController::class, 'show'])->name('members.show');
Route::get('/members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/{id}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{book_id}', [MemberController::class, 'destroy'])->name('members.destroy');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::group(['middleware' => 'auth'], function () {
//     // Rute untuk anggota
// });

// Route::group(['middleware' => 'auth:admin'], function () {
//     // Rute untuk admin
// });
