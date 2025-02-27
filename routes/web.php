<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataLSP\AsesiController;
use App\Http\Controllers\DataLSP\AsesorController;
use App\Http\Controllers\DataLSP\ManajemenController;
use App\Http\Controllers\DataLSP\SkemaController;
use App\Http\Controllers\DataLSP\TUKController;
use App\Http\Controllers\Developer\ExcelController;
use App\Http\Controllers\LogController;
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



Route::get('/import', [ExcelController::class, 'index']);

Route::post('/import', [AsesiController::class, 'importExcel'])->name('import');



// Middleware Login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/logs', [LogController::class, 'index']);

    // ############################################################ QR Code
    Route::resource('/qr-code', QRCodeController::class)->except(['create', 'show', 'edit', 'update']);

    // ############################################################ Surat Tugas Asesor
    Route::get('suratTugasAsesor/compact', [SuratTugasAsesorController::class, 'compact'])->name('surat-tugas-asesor-compact');
    Route::get('suratTugasAsesor', [SuratTugasAsesorController::class, 'index'])->name('surat-tugas-asesor.view');
    Route::get('suratTugasAsesor/create', [SuratTugasAsesorController::class, 'createSurat'])->name('surat-tugas-asesor.create');
    Route::post('suratTugasAsesor/store', [SuratTugasAsesorController::class, 'store'])->name('surat-tugas-asesor.store');
    Route::post('suratTugasAsesor/edit/{id}', [SuratTugasAsesorController::class, 'editSurat'])->name('surat-tugas-asesor.edit');
    Route::post('suratTugasAsesor/update/{id}', [SuratTugasAsesorController::class, 'updateSurat'])->name('surat-tugas-asesor.update');

    Route::delete('suratTugasAsesor/destroy/{id}', [SuratTugasAsesorController::class, 'destroy'])->name('surat-tugas-asesor.delete');

    Route::get('suratTugasAsesor/download{id}', [SuratTugasAsesorController::class, 'downloadSurat'])->name('surat-tugas-asesor.download');
    Route::get('suratTugasAsesor/generate-pdf/{id}', [SuratTugasAsesorController::class, 'generatePdf'])->name('surat-tugas-asesor.generatePdf');


    // ############################################################ TUK
    Route::get('data-tuk', [TUKController::class, 'tuk'])->name('tuk');
    Route::get('tukAdd', [TUKController::class, 'tukAdd'])->name('tukAdd');
    Route::post('tukAdded', [TUKController::class, 'tukAdded'])->name('tukAdded');
    Route::get('tukEdit', [TUKController::class, 'tukEdit'])->name('tukEdit');
    Route::post('tukEdited/{id}', [TUKController::class, 'tukEdited'])->name('tukEdited');
    Route::delete('tukDeleted/{id}', [TUKController::class, 'tukDeleted'])->name('tukDeleted');

    Route::get('get_data_tuk/{id}', [SuratTugasAsesorController::class, 'get_data_tuk'])->name('get_data_tuk');

    // ############################################################ Asesi
    Route::get('/asesi', [AsesiController::class, 'index'])->name('asesiIndex');
    Route::get('/asesi/import', [AsesiController::class, 'importExcel'])->name('asesiImport');
    Route::get('/asesi/compact', [AsesiController::class, 'compact'])->name('asesiCompact');
    Route::delete('/asesiDeleted/{id}', [AsesiController::class, 'asesiDeleted'])->name('asesiDeleted');


    // Route::get('tukAdd', [AsesiController::class, 'tukAdd'])->name('tukAdd');
    // Route::post('tukAdded', [AsesiController::class, 'tukAdded'])->name('tukAdded');
    // Route::get('tukEdit', [AsesiController::class, 'tukEdit'])->name('tukEdit');
    // Route::post('tukEdited/{id}', [AsesiController::class, 'tukEdited'])->name('tukEdited');
    // Route::delete('tukDeleted/{id}', [AsesiController::class, 'tukDeleted'])->name('tukDeleted');


    // ############################################################ Asesor
    Route::get('asesor/compact', [AsesorController::class, 'compact'])->name('asesor-compact');
    Route::resource('/asesor', AsesorController::class)->except('show');
    Route::get('get_data_asesor/{id}', [SuratTugasAsesorController::class, 'get_data_asesor'])->name('get_data_asesor');

    // ############################################################ Manajemen
    Route::get('manajemen/compact', [ManajemenController::class, 'compact'])->name('manajemen-compact');
    Route::resource('/manajemen', ManajemenController::class)->except('show');
    Route::get('get_data_manajemen/{id}', [ManajemenController::class, 'get_data_manajemen'])->name('get_data_manajemen');


    // ############################################################ Skema
    Route::resource('/skema', SkemaController::class)->except('show','edit', 'create');
});
