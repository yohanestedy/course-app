<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\WargaController;
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

    // TAMBAH DUSUN
    Route::get('/add', [DusunController::class, 'add'])->name('dusun.add');
    Route::post('/store', [DusunController::class, 'store'])->name('dusun.store');

    // EDIT DUSUN
    Route::get('/edit/{id}', [DusunController::class, 'edit'])->name('dusun.edit');
    Route::put('/update/{id}', [DusunController::class, 'update'])->name('dusun.update');


    // delete dusun
    Route::delete('/delete/{id}', [DusunController::class, 'delete'])->name('dusun.delete');
});

Route::prefix('warga')->group(function () {
    // INDEX WARGA
    Route::get('/', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/detail/{id}', [WargaController::class, 'detail'])->name('warga.detail');

    // TAMBAH WARGA
    Route::get('/add', [WargaController::class, 'add'])->name('warga.add');
    Route::post('/store', [WargaController::class, 'store'])->name('warga.store');

    // EDIT WARGA
    Route::get('/edit/{id}', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/update/{id}', [WargaController::class, 'update'])->name('warga.update');


    // delete WARGA
    Route::delete('/delete/{id}', [WargaController::class, 'delete'])->name('warga.delete');
});
