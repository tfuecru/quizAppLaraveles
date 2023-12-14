<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AliasController;

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

Route::get('/', function () {
    return view('app.base');
});

Route::resource('preguntas', PreguntaController::class);
Route::resource('admin', AdminController::class);
Route::resource('alias', AliasController::class);

// Ruta para mostrar el formulario de edición
Route::get('/admin/preguntas/{id}/edit', [AdminController::class, 'edit'])->name('admin.preguntas.edit');

// Ruta para procesar la actualización
Route::put('/admin/preguntas/{id}/update', [AdminController::class, 'update'])->name('admin.preguntas.update');
Route::delete('/admin/preguntas/{id}/destroy', [AdminController::class, 'destroy'])->name('admin.preguntas.destroy');

Route::post('/preguntas/resultados', [PreguntaController::class, 'store'])->name('resultados');

