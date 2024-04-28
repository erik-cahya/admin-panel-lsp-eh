<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataLSP\AsesorController;
use App\Http\Controllers\DataLSP\TUKController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\QRCode\QRCodeController;
use App\Http\Controllers\Surat\SuratTugasAsesorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__ . '/auth.php';


// Middleware Guest / Belum Login
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create']);
});


// Middleware Login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ############################################################ QR Code
    Route::resource('/qr-code', QRCodeController::class);
    Route::get('/download-qrcode/{id}', [QRCodeController::class, 'download'])->name('download.qrcode');
    Route::get('/download-qr/{content}', [QRCodeController::class, 'downloadQR'])->name('download.qr');


    // ############################################################ Surat Tugas Asesor
    Route::get('surat-tugas-asesor', [SuratTugasAsesorController::class, 'index'])->name('surat-tugas-asesor.view');
    Route::get('surat-tugas-asesor/create', [SuratTugasAsesorController::class, 'createSurat'])->name('surat-tugas-asesor.create');
    Route::post('surat-tugas-asesor/store', [SuratTugasAsesorController::class, 'store'])->name('surat-tugas-asesor.store');
    Route::post('surat-tugas-asesor/edit/{id}', [SuratTugasAsesorController::class, 'editSurat'])->name('surat-tugas-asesor.edit');
    Route::post('surat-tugas-asesor/update/{id}', [SuratTugasAsesorController::class, 'updateSurat'])->name('surat-tugas-asesor.update');

    Route::delete('surat-tugas-asesor/destroy/{id}', [SuratTugasAsesorController::class, 'destroy'])->name('surat-tugas-asesor.delete');

    Route::get('surat-tugas-asesor/download{id}', [SuratTugasAsesorController::class, 'downloadSurat'])->name('surat-tugas-asesor.download');
    Route::get('surat-tugas-asesor/generate-pdf/{id}', [SuratTugasAsesorController::class, 'generatePdf'])->name('surat-tugas-asesor.generatePdf');


    // ############################################################ TUK
    Route::get('tuk', [TUKController::class, 'tuk'])->name('tuk');
    Route::get('tukAdd', [TUKController::class, 'tukAdd'])->name('tukAdd');
    Route::post('tukAdded', [TUKController::class, 'tukAdded'])->name('tukAdded');
    Route::get('tukEdit', [TUKController::class, 'tukEdit'])->name('tukEdit');
    Route::post('tukEdited/{id}', [TUKController::class, 'tukEdited'])->name('tukEdited');
    Route::delete('tukDeleted/{id}', [TUKController::class, 'tukDeleted'])->name('tukDeleted');

    Route::get('get_data_tuk/{id}', [SuratTugasAsesorController::class, 'get_data_tuk'])->name('get_data_tuk');

    // ############################################################ Asesor
    Route::get('asesor', [AsesorController::class, 'asesor'])->name('asesor');
    Route::get('asesorAdd', [AsesorController::class, 'asesorAdd'])->name('asesorAdd');
    Route::post('asesorAdded', [AsesorController::class, 'asesorAdded'])->name('asesorAdded');
    Route::get('asesorEdit', [AsesorController::class, 'asesorEdit'])->name('asesorEdit');
    Route::post('asesorEdited/{id}', [AsesorController::class, 'asesorEdited'])->name('asesorEdited');
    Route::delete('asesorDeleted/{id}', [AsesorController::class, 'asesorDeleted'])->name('asesorDeleted');

    Route::get('get_data_asesor/{id}', [SuratTugasAsesorController::class, 'get_data_asesor'])->name('get_data_asesor');
});
