<?php

use App\Http\Controllers\AdviceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('getAdviceList', [HomeController::class, 'getAdviceList']);
Route::post('showAdviceDetail', [HomeController::class, 'showAdviceDetail']);

Route::prefix('lang')->group(function () {
    Route::post('setLang', [LangController::class, 'setLang']);
    Route::post('getLangList', [LangController::class, 'getLangList']);
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('advice')->group(function () {
        Route::get('/', [AdviceController::class, 'index']);
        Route::post('getMainList', [AdviceController::class, 'getMainList']);
        Route::post('addModal', [AdviceController::class, 'addModal']);
        Route::post('saveData', [AdviceController::class, 'saveData']);
        Route::post('editModal', [AdviceController::class, 'editModal']);
        Route::post('updateData', [AdviceController::class, 'updateData']);
        Route::post('deleteData', [AdviceController::class, 'deleteData']);
    });
    Route::prefix('lang')->group(function () {
        Route::post('addModal', [LangController::class, 'addModal']);
        Route::post('generateTranslate', [LangController::class, 'generateTranslate']);
        Route::post('getLangRequest', [LangController::class, 'getLangRequest']);
        Route::post('saveLang', [LangController::class, 'saveLang']);
    });
});
