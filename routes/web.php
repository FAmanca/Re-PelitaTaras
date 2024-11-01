<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AichatController;
use App\Http\Controllers\KelolaPostController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
})->name('about');


// Route::get('/pdf', function() {
//     return view('pdf');
// })->name('about');

//! POST
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('posts.show');
//! POST

//? AI CHAT
Route::get('/ai', [AichatController::class, 'index'])->name('ai');
Route::post('/ai', [AichatController::class, 'store'])->name('ai');
//? AI CHAT

//! SRQ 29
Route::get('/srq29', [KuisController::class, 'index'])->name('srq29');
Route::get('/kuis', [KuisController::class, 'show'])->name('srq29');
Route::post('/hasil', [KuisController::class, 'submit'])->name('srq.submit');
Route::get('/print', [KuisController::class, 'printPDF'])->name('srq.print');
//! SRQ 29

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/admin', function() {
//     return view('admin/dashboard');
// })->name('admin');

// Admin routes with role check

Route::middleware(['auth', CheckRole::class])->group(function () {
    Route::get('/admin', [UsersController::class, 'index']);

    Route::get('/kelolapost', [PostController::class, 'kelola'])->name('posts.index');
    Route::post('/createpost', [PostController::class, 'store'])->name('posts.store');
    Route::get('/createpost', [PostController::class, 'create'])->name('posts.create');
    Route::delete('/deletepost/{id}', [PostController::class, 'delete'])->name('post.delete');
    Route::put('kelolapost/editpost/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('kelolapost/updatepost/{id}', [PostController::class, 'update'])->name('posts.update');

    Route::delete('/kelolapost/deletepost/{id}', [KelolaPostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/kelolakuis/createkuis', [KuisController::class, 'store'])->name('kuis.store');
});
