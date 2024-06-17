<?php

use Illuminate\Support\Facades\Auth;
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

Route::prefix('tugas')->group(function () {
    Route::get('/', [App\Http\Controllers\TugasController::class, 'index'])->name('indexTugas');
});

Route::prefix('ebook')->group(function () {
    Route::get('/', [App\Http\Controllers\EbookController::class, 'index'])->name('indexEbook');
});

Route::prefix('grup')->group(function () {
    Route::get('/', [App\Http\Controllers\GrupController::class, 'index'])->name('indexGrup');
    Route::get('/chat', [App\Http\Controllers\GrupController::class, 'indexChat'])->name('indexChat');
    Route::post('/send-message', [App\Http\Controllers\GrupController::class, 'sendMessage']);
});

Route::prefix('point')->group(function () {
    Route::get('/', [App\Http\Controllers\PointController::class, 'index'])->name('indexPoint');
});

Route::prefix('user')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('indexUser');
    Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('deleteUser');
});