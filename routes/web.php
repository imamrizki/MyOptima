<?php

use App\Http\Controllers\Authentication\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PermintaanController;

Route::get('/get-permintaan', [PermintaanController::class, 'getDataPermintaan'])->name('get_permintaan');

Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/', [PermintaanController::class, 'pagePermintaan'])->name('page_permintaan');
    Route::get('/input-permintaan', [PermintaanController::class, 'inputPermintaan'])->name('input_permintaan');
    Route::post('/simpan-permintaan', [PermintaanController::class, 'simpanPermintaan'])->name('simpan_permintaan');

    Route::get('/project', [ProjectController::class, 'inputProject'])->name('input_project');
    Route::post('/simpan-project', [ProjectController::class, 'simpanProject'])->name('simpan_project');
    Route::post('/update-project', [ProjectController::class, 'updateProject'])->name('update_project');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // logout
});

Route::prefix('auth')->name('auth.')->group(function (){
    Route::get('/login', [AuthController::class, 'index'])->name('login'); // login view
    Route::post('/login-post', [AuthController::class, 'login'])->name('login-post');
});

