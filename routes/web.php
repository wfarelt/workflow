<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\WestadoController;
use App\Http\Controllers\WorkflowEstadoController;
use App\Http\Controllers\WorkflowAccioneController;
use App\Http\Controllers\WorkflowTareaController;
use App\Http\Controllers\WorkflowController;
use App\Http\Controllers\TareaWorkflowEstadoController;

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\TareaController;

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
    //return view('welcome');

    return view('auth.login');
    
});

/*
Route::get('/persona', function () {
    return view('persona.index');
});

Route::get('/persona/create',[PersonaController::class,'create']);
*/


//MODULO SECCION

Auth::routes(['register'=>true, 'reset'=>false]);
Route::get('/home', [PersonaController::class, 'index'])->name('home');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [PersonaController::class, 'index'])->name('home');
});

//MODULO ADMINISTRACION
//Route::resource('cargos', CargoController::class)->middleware('auth');
Route::resource('persona', PersonaController::class)->middleware('auth');
Route::resource('cargos', CargoController::class)->middleware('auth');
Route::resource('departamentos', DepartamentoController::class)->middleware('auth');

//MODULO WORKFLOW
Route::resource('estados', EstadoController::class)->middleware('auth');
Route::resource('workflow-estados', WorkflowEstadoController::class)->middleware('auth');
Route::resource('workflow-acciones', WorkflowAccioneController::class)->middleware('auth');
Route::resource('workflow-tareas', WorkflowTareaController::class)->middleware('auth');
Route::resource('workflows', WorkflowController::class)->middleware('auth');

//MODULO TAREA
Route::resource('tareas', TareaController::class)->middleware('auth');
Route::resource('tarea-workflow-estados', TareaWorkflowEstadoController::class)->middleware('auth');
