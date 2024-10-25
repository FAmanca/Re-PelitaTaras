<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AichatController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('landing');
});

Route::get('/about', function() {
    return view('about');
})->name('about');

//* SRQ
Route::get('/srq29', function() {
    return view('srq29');
})->name('srq29');
//* SRQ

//! POST
Route::get('/posts', function() {
    return view('posts');
})->name('posts');
//! POST

//? AI CHAT
Route::get('/ai', [AichatController::class, 'index'])->name('ai');
Route::post('/ai', [AichatController::class, 'store'])->name('ai');
//? AI CHAT

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

Route::get('/dashboard', function() {
    return view('admin/dashboard');
})->name('posts');


