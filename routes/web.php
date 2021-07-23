<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

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

Route::resource('persona', PersonaController::class)->middleware('auth');
Auth::routes(['register'=>true, 'reset'=>false]);

Route::get('/home', [PersonaController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [PersonaController::class, 'index'])->name('home');
});