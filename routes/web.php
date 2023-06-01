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
use App\Http\Controllers\BookRequestController;
use App\Http\Controllers\BookReturnController;

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
Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('members.destroy');

// Route book_requests
Route::get('/book-requests', [BookRequestController::class, 'index'])->name('book_requests.index');
Route::get('/book-requests/create', [BookRequestController::class, 'create'])->name('book_requests.create');
Route::post('/book-requests', [BookRequestController::class, 'store'])->name('book_requests.store');
Route::get('/book-requests/{id}', [BookRequestController::class, 'show'])->name('book_requests.show');
Route::get('/book-requests/{id}/edit', [BookRequestController::class, 'edit'])->name('book_requests.edit');
Route::put('/book-requests/{id}', [BookRequestController::class, 'update'])->name('book_requests.update');
Route::delete('/book-requests/{id}', [BookRequestController::class, 'destroy'])->name('book_requests.destroy');

// Route approve reject book request
Route::get('/book-requests/{id}/request-approved', [BookRequestController::class, 'request_approved'])->name('book_requests.request_approved');
Route::get('/book-requests/{id}/request-rejected', [BookRequestController::class, 'request_rejected'])->name('book_requests.request_rejected');

// Route book_returns
Route::get('/book-returns', [BookReturnController::class, 'index'])->name('book_returns.index');
Route::post('/book-returns', [BookRequestController::class, 'index'])->name('book_returns.get_data');
// Route::get('/book-requests/{id}/request-approved', 'BookRequestController@requestApproved')->name('book_requests.request_approved');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::group(['middleware' => 'auth'], function () {
//     // Rute untuk anggota
// });

// Route::group(['middleware' => 'auth:admin'], function () {
//     // Rute untuk admin
// });
