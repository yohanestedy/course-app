<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\HelloController;
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

Route::get('/', function () {
    return view('pages.master.index');
});

Route::get('/hello-world', [HelloController::class, 'index']);

// BLOG
Route::prefix('/blog')->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/show/{slug}', [BlogController::class, 'show']);
});

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);

Route::post('/register-new-user', [AuthController::class, 'register_new_user']);


//Mini Apps

// DUSUN
Route::prefix('dusun')->group(function () {
    Route::get('/', [DusunController::class, 'index'])->name('dusun.index');
    Route::get('/detail/{id}', [DusunController::class, 'detail'])->name('dusun.detail');
    Route::get('/add', [DusunController::class, 'add'])->name('dusun.add');
    Route::post('/store', [DusunController::class, 'store'])->name('dusun.store');

    // delete dusun
    Route::delete('/delete/{id}', [DusunController::class, 'delete'])->name('dusun.delete');
});
