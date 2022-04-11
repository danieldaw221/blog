<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\NominasController;
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

Route::get('/', HomeController::class)->name('home');


Route::controller(EmpleadosController::class)->group(function () {
    Route::get('empleados','index')->name('empleados.index');
    Route::get('empleados/create', 'create')->name('empleados.create');
    Route::get('empleados/{id}', 'show')->name('empleados.show');
    Route::get('empleados/{IDEMPLEADO}/nominas/{IDNOMINA}/', 'datos')->name('empleados.datos');
});

Route::controller(CursoController::class)->group(function () {
    Route::get('cursos','index')->name('cursos.index');
    Route::get('cursos/create', 'create')->name('cursos.create');
    Route::get('cursos/{curso}', 'show')->name('cursos.show');
});

Route::view('nosotros','nosotros')->name('nosotros');