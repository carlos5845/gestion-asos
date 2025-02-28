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
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para cada módulo

Route::resource('categorias', CategoriaController::class)->parameters([
    'categorias' => 'idcategoria'
]);
Route::resource('agrupamiento', AgrupamientoController::class);
Route::resource('cargo', CargoController::class)->parameters([
    'cargo' => 'idcargo'
]);
Route::resource('dia_laborable', DiaLaborableController::class)->parameters([
    'dia_laborable' => 'iddia_laborable'
]);
Route::resource('grupo', GrupoController::class)->parameters([
    'grupo' => 'idgrupo'
]);
Route::resource('socio', SocioController::class)->parameters([
    'socio' => 'idsocio'
]);
Route::resource('junta_directiva', JuntaDirectivaController::class)->parameters([
    'junta_directiva' => 'idjunta_directiva'
]);
Route::resource('padron_socios', PadronSociosController::class)->parameters([
    'padron_socios' => 'idpadron_socios'
]);

Route::resource('acta_constitucion', ActaConstitucionController::class)->parameters([
    'acta_constitucion' => 'idacta_constitucion'
]);

Route::resource('acta_constatacion', ActaConstatacionController::class)->parameters([
    'acta_constatacion' => 'idacta_constatacion'
]);

Route::resource('resolucion_gdh', ResolucionGdhController::class)->parameters([
    'resolucion_gdh' => 'idresolucion_gdh'
]);

Route::resource('vigencia_poder', VigenciaPoderController::class)->parameters([
    'vigencia_poder' => 'idvigencia_poder'
]);
require __DIR__ . '/auth.php';
