<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PremiumController;

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
Route::get('/premium/info', [PremiumController::class, 'info'])->name('premium.info');
Route::redirect('/', '/posts');

Route::middleware('auth')->group(function () {

    Route::middleware('role:content_creator')->group(function () {
        Route::resource('/creators/posts', CreatorController::class)->except('index', 'show');
        Route::get('/creators/dashboard', [CreatorController::class, 'index'])->name('creators.index');
        Route::post('/creators/categories', [CategoryController::class, 'store'])->name('categories.store');
    });

    Route::middleware('role:subscriber_premium')->group(function () {
        Route::get('/premium/posts/{post}', [PremiumController::class, 'show'])->name('premium.show');
        Route::get('/premium/dashboard', [PremiumController::class, 'index'])->name('premium.index');
    });

    Route::get('/register/edit', [RegisterController::class, 'edit'])->name('register.edit');
    Route::patch('/register', [RegisterController::class, 'update'])->name('register.update');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('logout', [SessionsController::class, 'destroy']);
    
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('login', [SessionsController::class, 'create'])->name('login.create');
    Route::post('login', [SessionsController::class, 'store']);
});