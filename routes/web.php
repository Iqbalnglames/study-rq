<?php

use App\Http\Controllers\MateriController;
use App\Http\Controllers\TaskController;
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

Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('/logout');

    // Dashboard routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [MateriController::class, 'dashboard']);
        Route::get('/list', [MateriController::class, 'indexMateriDashboard']);
        Route::get('/buat-materi', [MateriController::class, 'create']);
        Route::post('/buat-materi', [MateriController::class, 'store'])->name('/buat-materi');
        Route::get('/list-tugas', [TaskController::class, 'taskList']);
        Route::get('/buat-tugas', [TaskController::class, 'newTask']);
        Route::post('/buat-tugas', [TaskController::class, 'createTask'])->name('/buat-tugas');
        Route::get('/edit-tugas/{tasks:slug}', [TaskController::class, 'editTask']);
        Route::get('/hapus-tugas/{tasks:slug}', [TaskController::class, 'deleteTask']);
        Route::get('/responden', [TaskController::class, 'showAnswer']);
        Route::get('/{tasks:slug}/responden', [TaskController::class, 'showAttendance']);
        Route::get('/edit-materi/{materials:slug}', [MateriController::class, 'edit']);
        Route::put('/update-materi/{material:slug}', [MateriController::class, 'update'])->name('update-materi');
        Route::delete('/material/{material}/delete', [MateriController::class, 'delete']);
    });
});

// Penugasan routes
Route::prefix('penugasan')->group(function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::post('/kirim-tugas/tugas', [TaskController::class, 'answeredTask'])->name('kirim-tugas');
    Route::get('/{material:slug}', [TaskController::class, 'tasksListSantri']);
    Route::get('/{material:slug}/{task:slug}', [TaskController::class, 'executionTask']);
});

// Kelas routes
Route::get('/kelas', [MateriController::class, 'indexKelas']);
Route::get('/{classLevel:slug}', [MateriController::class, 'indexMateri']);
Route::get('/{classLevel:slug}/{material:slug}', [MateriController::class, 'show']);
