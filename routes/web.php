<?php

use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongController;
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

Route::get('/songs', [SongController::class, 'index']);
Route::post('/songs', [SongController::class, 'store']);
Route::get('/songs/{id}', [SongController::class, 'show']);
Route::get('/songs/{id}/download', [SongController::class, 'download']);

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

        });

        Route::prefix('playlist_song')->group(function() {

        });

        Route::prefix('dowload')->group(function() {

        });

        Route::prefix('favorite')->group(function() {

        });
    });
    Route::get('/', function () {
        return view('admin.song.add');
    })->name('welcome');
});
