<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route Absen (Public)
Route::get('/', [AbsenController::class, 'index'])->name('absen.index');
Route::post('/absen/check', [AbsenController::class, 'check'])->name('absen.check');

// Route Admin (Protected)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:pengguna')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Departemen
        Route::get('/departemen', [AdminController::class, 'departemen'])->name('admin.departemen');
        Route::get('/departemen/create', [AdminController::class, 'departemenCreate'])->name('admin.departemen.create');
        Route::post('/departemen/store', [AdminController::class, 'departemenStore'])->name('admin.departemen.store');
        Route::get('/departemen/{id}/edit', [AdminController::class, 'departemenEdit'])->name('admin.departemen.edit');
        Route::post('/departemen/{id}/update', [AdminController::class, 'departemenUpdate'])->name('admin.departemen.update');
        Route::post('/departemen/{id}/delete', [AdminController::class, 'departemenDelete'])->name('admin.departemen.delete');

        // Plant
        Route::get('/plant', [AdminController::class, 'plant'])->name('admin.plant');
        Route::get('/plant/create', [AdminController::class, 'plantCreate'])->name('admin.plant.create');
        Route::post('/plant/store', [AdminController::class, 'plantStore'])->name('admin.plant.store');
        Route::get('/plant/{id}/edit', [AdminController::class, 'plantEdit'])->name('admin.plant.edit');
        Route::post('/plant/{id}/update', [AdminController::class, 'plantUpdate'])->name('admin.plant.update');
        Route::post('/plant/{id}/delete', [AdminController::class, 'plantDelete'])->name('admin.plant.delete');

        // Karyawan
        Route::get('/karyawan', [AdminController::class, 'karyawan'])->name('admin.karyawan');
        Route::get('/karyawan/create', [AdminController::class, 'karyawanCreate'])->name('admin.karyawan.create');
        Route::post('/karyawan/store', [AdminController::class, 'karyawanStore'])->name('admin.karyawan.store');
        Route::get('/karyawan/{id}/detail', [AdminController::class, 'karyawanDetail'])->name('admin.karyawan.detail');
        Route::get('/karyawan/{id}/edit', [AdminController::class, 'karyawanEdit'])->name('admin.karyawan.edit');
        Route::post('/karyawan/{id}/update', [AdminController::class, 'karyawanUpdate'])->name('admin.karyawan.update');
        Route::post('/karyawan/{id}/delete', [AdminController::class, 'karyawanDelete'])->name('admin.karyawan.delete');
        Route::post('/karyawan/import', [AdminController::class, 'karyawanImport'])->name('admin.karyawan.import');
        Route::get('/karyawan/template', [AdminController::class, 'karyawanTemplate'])->name('admin.karyawan.template');
        Route::post('/karyawan/kirim-undangan', [AdminController::class, 'karyawanKirimUndangan'])->name('admin.karyawan.kirimUndangan');
        Route::post('/karyawan/{id}/kirim-undangan', [AdminController::class, 'karyawanKirimUndanganSatu'])->name('admin.karyawan.kirimUndanganSatu');

        // Pengguna
        Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');
        Route::get('/pengguna/create', [AdminController::class, 'penggunaCreate'])->name('admin.pengguna.create');
        Route::post('/pengguna/store', [AdminController::class, 'penggunaStore'])->name('admin.pengguna.store');
        Route::get('/pengguna/{id}/edit', [AdminController::class, 'penggunaEdit'])->name('admin.pengguna.edit');
        Route::post('/pengguna/{id}/update', [AdminController::class, 'penggunaUpdate'])->name('admin.pengguna.update');
        Route::post('/pengguna/{id}/delete', [AdminController::class, 'penggunaDelete'])->name('admin.pengguna.delete');

        // Absen
        Route::get('/absen', [AdminController::class, 'absen'])->name('admin.absen');
        Route::get('/absen/create', [AdminController::class, 'absenCreate'])->name('admin.absen.create');
        Route::post('/absen/store', [AdminController::class, 'absenStore'])->name('admin.absen.store');
        Route::get('/absen/{id}/edit', [AdminController::class, 'absenEdit'])->name('admin.absen.edit');
        Route::post('/absen/{id}/update', [AdminController::class, 'absenUpdate'])->name('admin.absen.update');
        Route::post('/absen/{id}/delete', [AdminController::class, 'absenDelete'])->name('admin.absen.delete');
        Route::post('/absen/delete-all', [AdminController::class, 'absenDeleteAll'])->name('admin.absen.deleteAll');
    });
});
