<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::redirect('/', '/posts');

Route::middleware('auth')->group(function () {
    Route::middleware('creator')->prefix('admin')->group(function () {
        Route::resource('/posts', AdminPostController::class)->except('index', 'show');
        Route::get('/dashboard', [AdminPostController::class, 'index'])->name('dashboard.index');
        Route::post('/posts/categories', [CategoryController::class, 'store'])->name('categories.store');
    });

    Route::post('/posts/{post}/comments', [PostCommentController::class, 'store'])->name('comments.store');
    Route::post('logout', [SessionsController::class, 'destroy']);
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('login', [SessionsController::class, 'create'])->name('login.create');
    Route::post('login', [SessionsController::class, 'store']);
});