<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('akun')->group(function () {
    Route::get('/profil', [App\Http\Controllers\AkunController::class, 'index'])->name('indexProfil');
    Route::post('/updateData', [App\Http\Controllers\AkunController::class, 'updateData'])->name('updateData');
    Route::post('/crop-image-upload', [App\Http\Controllers\AkunController::class, 'uploadCropImage'])->name('crop-image-upload');
});
