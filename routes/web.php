<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminBlogController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/contact', 'contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Public Blog Routes
|--------------------------------------------------------------------------
*/
Route::get('/blogs', [AdminBlogController::class, 'publicIndex'])->name('blogs');
Route::get('/blogs/{blog}', [AdminBlogController::class, 'show'])->name('blogs.show');

/*
|--------------------------------------------------------------------------
| Guest only routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

/*
|--------------------------------------------------------------------------
| Auth only routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Admin Blog Dashboard Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/admin/blogs', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/admin/blogs/{blog}/edit', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/admin/blogs/{blog}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/admin/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');
});