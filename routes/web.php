<?php

use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/changelog', function () {
    return view('changelog');
})->name('changelog');

Route::get('/login', [UserController::class, 'login']);

Route::post('/login-action', [UserController::class, 'loginAction'])->name('/login-action');
Route::middleware('auth')->group(function() {    
    Route::get('/logout', [UserController::class, 'logout'])->name('/logout');
    Route::get('/dashboard', [MateriController::class, 'dashboard']);
    Route::get('/dashboard/list', [MateriController::class, 'indexMateriDashboard']);
    Route::get('/dashboard/buat-materi', [MateriController::class, 'create']);
    Route::post('/dashboard/buat-materi', [MateriController::class, 'store'])->name('/buat-materi');
    Route::get('/dashboard/edit-materi/{material}/{materials:slug}', [MateriController::class, 'edit']);
    Route::put('/dashboard/update-materi/{material}', [MateriController::class, 'update'])->name('update-materi');
    Route::get('/dashboard/material/{material}/delete', [MateriController::class, 'delete']);
});


Route::get('/kelas', [MateriController::class, 'indexKelas']);
Route::get('/{classLevel:slug}', [MateriController::class, 'indexMateri']);
Route::get('/{classLevel:slug}/{material:slug}', [MateriController::class, 'show']);

