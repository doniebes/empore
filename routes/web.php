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
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ApiController;


 // Route untuk menampilkan daftar buku
 Route::get('/api/books', [ApiController::class, 'get_books'])->name('api.books');
 //  Route::get('/api/books/{id}', [ApiController::class, 'book_by_id'])->name('api.books');
 Route::get('/api/books/{code}', [ApiController::class, 'book_bycode'])->name('api.books');
 Route::post('/api/books', [ApiController::class, 'post_books'])->name('api.post_books');
 Route::put('/api/books/{code}', [ApiController::class, 'put_books'])->name('api.put_books');
 Route::delete('/api/books/{code}', [ApiController::class, 'delete_books'])->name('api.delete_books');

// Admin Authentication Routes
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'admin', 'middleware' => 'admin.auth'], function () {
    
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
    Route::post('/book-returns', [BookReturnController::class, 'index'])->name('book_returns.get_data');
    Route::post('/book-returns/proses', [BookReturnController::class, 'proses_return'])->name('book_returns.proses');
    
    // Dasboard
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard.admin');

});

// Member Authentication Routes
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'member', 'middleware' => 'member.auth'], function () {
    
    // Dasboard
    Route::get('/dashboard', [DashboardController::class, 'member'])->name('dashboard.member');

    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('member.profile');
    Route::get('/book-requests', [BookRequestController::class, 'member'])->name('book_requests.member');
    Route::post('/book-requests', [BookRequestController::class, 'addBookRequest'])->name('book_requests.add');

    Route::get('/borrows', [BorrowController::class, 'index'])->name('borrows.member');
    
});

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/member/login', [MemberAuthController::class, 'showLoginForm'])->name('member.login');
Route::post('/member/login', [MemberAuthController::class, 'login'])->name('member.login.post');
Route::get('/member/logout', [MemberAuthController::class, 'logout'])->name('member.logout');

// default route
Route::get('/', function () {
    return view('portal');
})->name('portal');
