<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PermintaanController;

Route::get('/', [PermintaanController::class, 'pagePermintaan'])->name('page_permintaan');
Route::get('/input-permintaan', [PermintaanController::class, 'inputPermintaan'])->name('input_permintaan');
Route::post('/simpan-permintaan', [PermintaanController::class, 'simpanPermintaan'])->name('simpan_permintaan');
Route::get('/get-permintaan/{id?}', [PermintaanController::class, 'getDataProject']);

Route::get('/project', [ProjectController::class, 'inputProject'])->name('input_project');

