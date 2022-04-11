<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ApiController::class)->group(function () {
    Route::get('empleados','ver');
    Route::post('empleados', 'nuevo');
    Route::put('empleados', 'modificar');
    Route::delete('empleados', 'borrar');
    
    Route::get('empleado/{id}/nominas', 'nominasEmpleado');
    Route::get('nomina/{id}','nomina');
});


// Route::get('cursos/{id}/finalizar','cursoController@');
