<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PlaylistSongController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [UserController::class, 'index'])->name('login');
Route::get('register', [UserController::class, 'show'])->name('register');
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::post('upload/services', [UploadController::class, 'store']);

Route::middleware(['auth'])->group(function() {
    Route::prefix('admin')->middleware('admin')->group(function() {
        Route::get('/', function () {
            return view('welcome');
        })->name('welcome');

        Route::prefix('playlist')->group(function() {
            Route::get('add', [PlaylistController::class, 'create']);
            Route::get('list', [PlaylistController::class, 'index']);
            Route::get('edit/{id}', [PlaylistController::class, 'show']);
            Route::post('add', [PlaylistController::class, 'store']);
            Route::post('edit/{id}', [PlaylistController::class, 'update']);
            Route::delete('destroy', [PlaylistController::class, 'destroy']);
        });

        Route::prefix('song')->group(function() {
            Route::get('add', [SongController::class, 'create']);
            Route::get('list', [SongController::class, 'index']);
            Route::get('edit/{id}', [SongController::class, 'show']);
            Route::post('add', [SongController::class, 'store']);
            Route::post('edit/{id}', [SongController::class, 'update']);
            Route::delete('destroy', [SongController::class, 'destroy']);
        });

        Route::prefix('playlist_song')->group(function() {
            Route::get('add', [PlaylistSongController::class, 'Create']);
            Route::get('list', [PlaylistSongController::class, 'index']);
            Route::get('edit/{id}', [PlaylistSongController::class, 'show']);
            Route::post('add', [PlaylistSongController::class, 'store']);
            Route::post('edit/{id}', [PlaylistSongController::class, 'update']);
            Route::delete('destroy', [PlaylistSongController::class, 'destroy']);
        });

        Route::prefix('download')->group(function() {
            Route::get('list', [DownloadController::class, 'index']);
        });

        Route::prefix('favorite')->group(function() {
            Route::get('list', [FavoriteController::class, 'index']);
        });
    });

    Route::get('home', function() {
        return view('home');
    })->name('home');

    Route::post('/add-download', [DownloadController::class, 'store']);
    Route::post('add-favorite', [FavoriteController::class, 'store']);
});
