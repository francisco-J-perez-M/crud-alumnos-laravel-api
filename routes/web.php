<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\AlumnoController;
Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumno.create');

Route::get('/alumnos', [AlumnoController::class, 'getData'])->name('alumno.index');
Route::get('/alumnos/{id}', [AlumnoController::class, 'getData2'])->name('alumno.show');

Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumno.store');
Route::get('/alumnos/{id}/editar', [AlumnoController::class, 'edit'])->name('alumno.edit');
Route::put('/alumnos/{id}', [AlumnoController::class, 'updateData'])->name('alumno.update');
Route::delete('/alumnos/{id}', [AlumnoController::class, 'deleteData'])->name('alumno.destroy');


use App\Http\Controllers\grupoController;

Route::get('/grupos', [GrupoController::class, 'index'])->name('grupo.index');
Route::get('/grupos/crear', [GrupoController::class, 'create'])->name('grupo.create');
Route::post('/grupos', [GrupoController::class, 'store'])->name('grupo.store');
Route::get('/grupos/{id}', [GrupoController::class, 'show'])->name('grupo.show');
Route::get('/grupos/{id}/editar', [GrupoController::class, 'edit'])->name('grupo.edit');
Route::put('/grupos/{id}', [GrupoController::class, 'update'])->name('grupo.update');
Route::delete('/grupos/{id}', [GrupoController::class, 'destroy'])->name('grupo.destroy');

use App\Http\Controllers\CarreraController;

Route::get('/carrera', [CarreraController::class, 'index'])->name('carrera.index');
Route::get('/carrera/{id}', [CarreraController::class, 'show'])->name('carrera.show');
Route::post('/carrera', [CarreraController::class, 'store'])->name('carrera.store');
Route::put('/carrera/{id}', [CarreraController::class, 'update'])->name('carrera.update');
Route::delete('/carrera/{id}', [CarreraController::class, 'destroy'])->name('carrera.destroy');
Route::get('/carreras/crear', [CarreraController::class, 'create'])->name('carrera.create');
Route::get('/carreras/{id}/editar', [CarreraController::class, 'edit'])->name('carrera.edit');

use App\Http\Controllers\UniversidadController;

Route::get('/universidad', [UniversidadController::class, 'index'])->name('universidad.index');
Route::get('/universidad/{id}', [UniversidadController::class, 'show'])->name('universidad.show');
Route::post('/universidad', [UniversidadController::class, 'store'])->name('universidad.store');
Route::put('/universidad/{id}', [UniversidadController::class, 'update'])->name('universidad.update');
Route::delete('/universidad/{id}', [UniversidadController::class, 'destroy'])->name('universidad.destroy');
Route::get('/universidades/crear', [UniversidadController::class, 'create'])->name('universidad.create');
Route::get('/universidades/{id}/editar', [UniversidadController::class, 'edit'])->name('universidad.edit');
