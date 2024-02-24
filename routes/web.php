<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;


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

Route::post('posts/{post}/comments', [PostCommentController::class, 'store'])->name('comments.store');

Route::middleware('creator')->group(function () {
    Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('posts.create');
    Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('posts.store');
    Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('posts.edit');
    Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update'])->name('posts.update');
    Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->name('posts.delete');
    Route::get('/admin/dashboard', [AdminPostController::class, 'index'])->name('dashboard.index');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('login', [SessionsController::class, 'create'])->name('login.create');
    Route::post('login', [SessionsController::class, 'store']);
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::redirect('/', '/posts');