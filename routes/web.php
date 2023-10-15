<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\CommentController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'home'])->name('home');
    Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/sort', [PostController::class, 'sort'])->name('posts.sort');
    Route::get('/posts/nation', [PostController::class, 'nation'])->name('index.nation');
    Route::get('/nations/{nation}',[NationController::class, 'index']);
    Route::get('/posts/result', [SearchController::class, 'search']);
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/confirm', [PostController::class, 'confirm'])->name('posts.confirm');
    
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    
    //投稿編集と更新
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{post}/confirm/edit', [PostController::class, 'confirm_edit'])->name('confirm.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('update');
    
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('show');
    
    Route::resource('comment',CommentController::class)->only(['store']);
    Route::delete('/comments/{id}', [CommentController::class, 'delete'])->name('comment.delete');
    Route::post('/like', [CommentController::class, 'like'])->name('like');
    Route::delete('/posts/{post}', [PostController::class, 'delete']);
        
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
