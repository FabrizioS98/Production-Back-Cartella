<?php

use App\Http\Controllers\DottoreController;
use App\Http\Controllers\EsameController;
use App\Http\Controllers\PazienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(PazienteController::class)->prefix('pazienti') -> group(function($router){
    Route::get('index','index');
    Route::get('create','create');
    Route::get('store','store');
    Route::get('show/{id}','show');
    Route::get('edit','edit');
    Route::get('destroy','destroy');
});

Route::controller(DottoreController::class)->prefix('dottori') -> group(function($router){
    Route::get('index','index');
    Route::get('create','create');
    Route::get('store','store');
    Route::get('show/{id}','show');
    Route::get('edit','edit');
    Route::get('destroy','destroy');
    Route::put('update/{id}', 'update');
});

Route::controller(EsameController::class)->prefix('esami') -> group(function($router){
    Route::get('index','index');
    Route::get('create','create');
    Route::get('store','store');
    Route::get('show','show');
    Route::get('edit','edit');
    Route::get('destroy','destroy');
});