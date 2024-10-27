<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AichatController;
use App\Http\Controllers\KuisController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('landing');
});

Route::get('/about', function() {
    return view('about');
})->name('about');

//! POST
Route::get('/posts', function() {
    return view('posts');
})->name('posts');
//! POST

//? AI CHAT
Route::get('/ai', [AichatController::class, 'index'])->name('ai');
Route::post('/ai', [AichatController::class, 'store'])->name('ai');
//? AI CHAT

//! SRQ 29
Route::get('/srq29', [KuisController::class, 'index'])->name('srq29');
Route::get('/kuis', [KuisController::class, 'show'])->name('srq29');
Route::post('/hasil', [KuisController::class, 'submit'])->name('srq.submit');
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

Route::get('/admin', function() {
    return view('admin/dashboard');
})->name('admin');


