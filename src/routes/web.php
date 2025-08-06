<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class,'index'])->name('contacts.create');
Route::post('/confirm', [ContactController::class,'confirm']);
Route::match(['get', 'post'], '/store', [ContactController::class,'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [ContactController::class, 'admin']);
    Route::get('/search', [ContactController::class, 'search']);
    Route::post('/delete', [ContactController::class, 'destroy']);
    Route::post('/export', [ContactController::class, 'export']);
    });