<?php

use App\Http\Controllers\BlogController;
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
    return view('welcome');
});

Route::get('/hello-world', [HelloController::class, 'index']);

// BLOG
Route::prefix('/blog')->group(function(){
    Route::get('/', [BlogController::class, 'index']);
});