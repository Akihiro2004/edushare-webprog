<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::middleware('auth')->group(function () {

    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        Route::get('/book/add', [PageController::class, 'addBook'])->name('addBookPage');
        Route::post('/books', [BookController::class, 'store'])->name('storeBook');
        Route::get('/book/{book}/edit', [PageController::class, 'editBook'])->name('editBookPage');
        Route::put('/book/{book}', [BookController::class, 'update'])->name('updateBook');
        Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('deleteBook');
        Route::get('/video/add', [PageController::class, 'addVideo'])->name('addVideoPage');
        Route::post('/videos', [VideoController::class, 'store'])->name('storeVideo');
        Route::get('/video/{video}/edit', [PageController::class, 'editVideo'])->name('editVideoPage');
        Route::put('/video/{video}', [VideoController::class, 'update'])->name('updateVideo');
        Route::delete('/video/{video}', [VideoController::class, 'destroy'])->name('deleteVideo');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/resource/books/{category_id?}', [PageController::class, 'books'])->name('books');
    Route::get('/resource/videos/{category_id?}', [PageController::class, 'videos'])->name('videos');

    Route::get('/resource/books/details/{book}', [PageController::class, 'bookDetail'])->name('bookDetail');
    Route::get('/resource/videos/details/{video}', [PageController::class, 'videoDetail'])->name('videoDetail');

    Route::get('/resource/books/download/{book}', [BookController::class, 'download'])->name('downloadBook');
});

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::fallback(function () {
    return redirect()->route('welcome')->with('error', 'Page not found or unauthorized access.');
});

require __DIR__.'/auth.php';
