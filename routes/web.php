<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('about.index');
});

Route::get('/hello', function () {
    return "Hello Laravel";
})->name("hello");

Route::get('/hello/{name}', function ($name) {
    return "Hello {$name}";
})->name("hello.name");

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/songs', [SongController::class, 'index'])->name('songs.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
