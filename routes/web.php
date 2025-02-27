<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\JuntaDirectivaController;
use App\Http\Controllers\AgrupamientoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DiaLaborableController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\VigenciaPoderController;
use App\Http\Controllers\PadronSociosController;
use App\Http\Controllers\ActaConstitucionController;
use App\Http\Controllers\ActaConstatacionController;
use App\Http\Controllers\ResolucionGdhController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Grupos y Asociaciones
Route::resource('grupos', GrupoController::class);
Route::resource('agrupamientos', AgrupamientoController::class);
Route::resource('categorias', CategoriaController::class);

// Socios
Route::resource('socios', SocioController::class);
Route::resource('padron-socios', PadronSociosController::class);

// Junta Directiva
Route::resource('junta-directiva', JuntaDirectivaController::class);
Route::resource('cargos', CargoController::class);

// Documentos y Actas
Route::resource('acta-constitucion', ActaConstitucionController::class);
Route::resource('acta-constatacion', ActaConstatacionController::class);
Route::resource('resolucion-gdh', ResolucionGdhController::class);
Route::resource('vigencia-poder', VigenciaPoderController::class);

// Configuración
Route::resource('dia-laborable', DiaLaborableController::class);
require __DIR__ . '/auth.php';
