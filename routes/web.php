<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[\App\Http\Controllers\FrontController::class,'index'])->name('index');

Route::get('/about',[\App\Http\Controllers\FrontController::class,'about'])->name('about');
Route::get('/brands',[\App\Http\Controllers\FrontController::class,'brands'])->name('brands');
Route::get('/franchise',[\App\Http\Controllers\FrontController::class,'franchise'])->name('franchise');
Route::get('/contact',[\App\Http\Controllers\FrontController::class,'contact'])->name('contact');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
