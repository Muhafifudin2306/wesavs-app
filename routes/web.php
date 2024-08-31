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

Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('setting')->group(function () {
    Route::prefix('home')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'settingHome'])->name('indexSettingHome');
        Route::post('/storeBlog', [App\Http\Controllers\HomeController::class, 'storeBlog'])->name('storeBlog');
        Route::delete('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('deleteBlog');
        Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'updateBlog'])->name('updateBlog');
    });
    Route::prefix('factor')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'settingFactor'])->name('indexFactor');
        Route::post('/storeFactor', [App\Http\Controllers\HomeController::class, 'storeFactor'])->name('storeFactor');
        Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'updateFactor'])->name('updateFactor');
        Route::delete('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroyFactor'])->name('deleteFactor');
    });
    Route::prefix('impact')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'settingImpact'])->name('indexImpact');
        Route::post('/storeImpact', [App\Http\Controllers\HomeController::class, 'storeImpact'])->name('storeImpact');
        Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'updateImpact'])->name('updateImpact');
        Route::delete('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroyImpact'])->name('deleteImpact');
    });
    Route::prefix('mitigation')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'settingMitigation'])->name('indexMitigation');
        Route::post('/storeMitigation', [App\Http\Controllers\HomeController::class, 'storeMitigation'])->name('storeMitigation');
        Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'updateMitigation'])->name('updateMitigation');
        Route::delete('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroyMitigation'])->name('deleteMitigation');
    });
    Route::prefix('tugas')->group(function () {
        Route::get('/', [App\Http\Controllers\TugasController::class, 'indexSetting'])->name('indexSettingTugas');
        Route::post('/updateData/{id}', [App\Http\Controllers\TugasController::class, 'updateData'])->name('updateSettingTugas');
    });
    Route::prefix('grup')->group(function () {
        Route::get('/', [App\Http\Controllers\GrupController::class, 'settingGrup'])->name('indexSettingGrup');
        Route::post('/storeGrup', [App\Http\Controllers\GrupController::class, 'storeGrup'])->name('storeGrup');
        Route::delete('/delete/{id}', [App\Http\Controllers\GrupController::class, 'destroyGrup'])->name('deleteGrup');
        Route::post('/update/{id}', [App\Http\Controllers\GrupController::class, 'updateGrup'])->name('updateSettingGrup');
    });
    Route::prefix('gift')->group(function () {
        Route::get('/', [App\Http\Controllers\PointController::class, 'settingGift'])->name('indexSettingGift');
        Route::post('/storeGift', [App\Http\Controllers\PointController::class, 'storeGift'])->name('storeGift');
        Route::delete('/delete/{id}', [App\Http\Controllers\PointController::class, 'destroyGift'])->name('deleteGift');
        Route::post('/update/{id}', [App\Http\Controllers\PointController::class, 'updateGift'])->name('updateSettingGift');
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('indexSettingOrder');
        Route::post('/update/dikirim/{id}', [App\Http\Controllers\OrderController::class, 'changeStatusDikirim'])->name('changeStatusDikirim');
        Route::post('/update/selesai/{id}', [App\Http\Controllers\OrderController::class, 'changeStatusDone'])->name('changeStatusDone');
        Route::post('/update/pending/{id}', [App\Http\Controllers\OrderController::class, 'changeStatusPending'])->name('changeStatusPending');
    });

    Route::prefix('landing')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'settingLanding'])->name('indexSettingLanding');
        Route::post('/changeValue', [App\Http\Controllers\HomeController::class, 'changeValueLanding'])->name('changeValueLanding');
        Route::post('/storeGallery', [App\Http\Controllers\HomeController::class, 'storeGallery'])->name('storeGallery');
        Route::delete('/deleteGallery/{id}', [App\Http\Controllers\HomeController::class, 'deleteGallery'])->name('deleteGallery');
        Route::post('/updateGallery/{id}', [App\Http\Controllers\HomeController::class, 'updateGallery'])->name('updateSettingGallery');
        Route::post('/storeTeam', [App\Http\Controllers\HomeController::class, 'storeTeam'])->name('storeTeam');
        Route::delete('/deleteTeam/{id}', [App\Http\Controllers\HomeController::class, 'deleteTeam'])->name('deleteTeam');
        Route::post('/updateTeam/{id}', [App\Http\Controllers\HomeController::class, 'updateTeam'])->name('updateSettingTeam');
    });
});

Route::prefix('order')->group(function () {
    Route::get('/user', [App\Http\Controllers\PointController::class, 'indexUserOrder'])->name('indexUserOrder');
    Route::post('add/{id}', [App\Http\Controllers\PointController::class, 'orderGift'])->name('orderGift');
});

Route::prefix('akun')->group(function () {
    Route::get('/profil', [App\Http\Controllers\AkunController::class, 'index'])->name('indexProfil');
    Route::post('/updateData', [App\Http\Controllers\AkunController::class, 'updateData'])->name('updateAkun');
    Route::post('/crop-image-upload', [App\Http\Controllers\AkunController::class, 'uploadCropImage'])->name('crop-image-upload');
});

Route::prefix('tugas')->group(function () {
    Route::get('/', [App\Http\Controllers\TugasController::class, 'index'])->name('indexTugas');
});

Route::prefix('ebook')->group(function () {
    Route::get('/', [App\Http\Controllers\EbookController::class, 'index'])->name('indexEbook');
    Route::get('/setting', [App\Http\Controllers\EbookController::class, 'settingEbook'])->name('indexSettingEbook');
    Route::post('/storeEbook', [App\Http\Controllers\EbookController::class, 'storeEbook'])->name('storeEbook');
    Route::post('/update/{id}', [App\Http\Controllers\EbookController::class, 'updateEbook'])->name('updateEbook');
    Route::delete('/delete/{id}', [App\Http\Controllers\EbookController::class, 'destroy'])->name('deleteEbook');
});

Route::prefix('grup')->group(function () {
    Route::get('/', [App\Http\Controllers\GrupController::class, 'index'])->name('indexGrup');
    Route::get('/me', [App\Http\Controllers\GrupController::class, 'userIndex'])->name('indexGrupMe');
    Route::get('/chat/{slug}', [App\Http\Controllers\GrupController::class, 'indexChat'])->name('indexChat');
    Route::post('/send-message', [App\Http\Controllers\GrupController::class, 'sendMessage']);
    Route::post('/join/{id}', [App\Http\Controllers\GrupController::class, 'joinGrup']);
    Route::delete('/leave/{id}', [App\Http\Controllers\GrupController::class, 'leaveGrup'])->name('leaveEbook');
});

Route::prefix('point')->group(function () {
    Route::get('/', [App\Http\Controllers\PointController::class, 'index'])->name('indexPoint');
});

Route::prefix('user')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('indexUser');
    Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('deleteUser');
    Route::post('/updateData/{id}', [App\Http\Controllers\UserController::class, 'updateData'])->name('updateData');
});