<?php

use Illuminate\Support\Facades\Route;
use App\Models\Package;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminPackageRequestController;

Route::get('/', function () {
    $packages = Package::where('is_active', true)
        ->latest()
        ->get();

    return view('home', compact('packages'));
})->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/contact', 'contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Contact Form Submit Route
|--------------------------------------------------------------------------
*/
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Public Blog Routes
|--------------------------------------------------------------------------
*/
Route::get('/blogs', [AdminBlogController::class, 'publicIndex'])->name('blogs');
Route::get('/blogs/{blog}', [AdminBlogController::class, 'show'])->name('blogs.show');

/*
|--------------------------------------------------------------------------
| Public Package / Plan Routes
|--------------------------------------------------------------------------
*/
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');

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
    /*
    |--------------------------------------------------------------------------
    | Dashboard Route
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | User Profile Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    /*
    |--------------------------------------------------------------------------
    | User Package / Plan Request Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/packages/{package}/processing', [PackageController::class, 'processing'])
        ->name('packages.processing');

    Route::post('/packages/{package}/submit-request', [PackageController::class, 'submitRequest'])
        ->name('packages.request.submit');

    Route::get('/packages/request/success', [PackageController::class, 'success'])
        ->name('packages.request.success');

    Route::get('/my-package-requests', [PackageController::class, 'myRequests'])
        ->name('packages.my-requests');

    /*
    |--------------------------------------------------------------------------
    | Logout Route
    |--------------------------------------------------------------------------
    */
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

    /*
    |--------------------------------------------------------------------------
    | Admin Contact Message Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/contact-messages', [ContactMessageController::class, 'index'])
        ->name('admin.contact-messages.index');

    Route::get('/admin/contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])
        ->name('admin.contact-messages.show');

    Route::delete('/admin/contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])
        ->name('admin.contact-messages.destroy');

    /*
    |--------------------------------------------------------------------------
    | Admin Package / Plan Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/packages', [AdminPackageController::class, 'index'])
        ->name('admin.packages.index');

    Route::get('/admin/packages/create', [AdminPackageController::class, 'create'])
        ->name('admin.packages.create');

    Route::post('/admin/packages', [AdminPackageController::class, 'store'])
        ->name('admin.packages.store');

    Route::get('/admin/packages/{package}/edit', [AdminPackageController::class, 'edit'])
        ->name('admin.packages.edit');

    Route::put('/admin/packages/{package}', [AdminPackageController::class, 'update'])
        ->name('admin.packages.update');

    Route::delete('/admin/packages/{package}', [AdminPackageController::class, 'destroy'])
        ->name('admin.packages.destroy');

    /*
    |--------------------------------------------------------------------------
    | Admin Package / Plan Request Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/package-requests', [AdminPackageRequestController::class, 'index'])
        ->name('admin.package-requests.index');

    Route::patch('/admin/package-requests/{packageRequest}/activate', [AdminPackageRequestController::class, 'activate'])
        ->name('admin.package-requests.activate');

    Route::patch('/admin/package-requests/{packageRequest}/reject', [AdminPackageRequestController::class, 'reject'])
        ->name('admin.package-requests.reject');

    Route::delete('/admin/package-requests/{packageRequest}', [AdminPackageRequestController::class, 'destroy'])
        ->name('admin.package-requests.destroy');
});