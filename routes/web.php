<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscussController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'publicFeed'])->name('feed');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

});

Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->middleware('auth')->name('posts.like');
Route::get('/informasi', [InformationController::class, 'index'])->name('informations.index');
Route::get('/informasi/{id}', [InformationController::class, 'show'])->name('informations.show');

Route::group(['middleware' => ['auth', 'role:mitra']], function () {
    Route::get('/informasi/create', [InformationController::class, 'create'])->name('informations.create');
    Route::post('/informasi', [InformationController::class, 'store'])->name('informations.store');
});

Route::get('/information', [InformationController::class, 'index'])->name('informations.index');

// Jika mitra ingin menambahkan
Route::get('/information/create', [InformationController::class, 'create'])->middleware('role:mitra')->name('informations.create');
Route::post('/information', [InformationController::class, 'store'])->middleware('role:mitra')->name('informations.store');

Route::middleware(['auth', 'role:mitra'])->group(function () {
    Route::get('/informations/create', [InformationController::class, 'create'])->name('informations.create');
    Route::post('/informations', [InformationController::class, 'store'])->name('informations.store');
});

Route::get('/informations/{id}', [InformationController::class, 'show'])->name('informations.show');
Route::get('/diskusi', [DiscussController::class, 'index'])->name('discuss.index');


Route::get('/dashboard', [PostController::class, 'myPosts'])
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__.'/auth.php';
