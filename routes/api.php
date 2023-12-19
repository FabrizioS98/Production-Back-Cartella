<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DottoreController;
use App\Http\Controllers\EsameController;
use App\Http\Controllers\PazienteController;
use App\Http\Controllers\UserController;
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
    Route::post('store','store');
    Route::get('show/{id}','show');
    Route::get('edit','edit');
    Route::get('destroy','destroy');
    Route::post('update/{id}', 'update');
    Route::delete('destroy/{id}', 'destroy');
    Route::get('/get-esami-by-paz-id/{id}', 'getEsamibyPazId');
});

 Route::controller(UserController::class)->prefix('users') -> group(function($router){
    Route::get('login','login');
    Route::get('create','create');
    Route::post('store','store');
    Route::get('show/{id}','show');
    Route::get('edit','edit');
    Route::get('destroy','destroy');
    Route::post('update/{id}', 'update');
    Route::delete('destroy/{id}', 'destroy');
    Route::get('/get-esami-by-dottore-id/{id}', 'getEsamebyDottId'); 
});

Route::controller(EsameController::class)->prefix('esami') -> group(function($router){
    Route::get('index','index');
    Route::get('create','create');
    Route::post('store','store');
    Route::get('show/{id}','show');
    Route::get('edit','edit');
    Route::get('destroy','destroy');
    Route::post('update/{id}', 'update');
    Route::delete('destroy/{id}', 'destroy');

    
});




Route::group(['middleware' => 'api','prefix' => 'auth'],
 function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
   // Route::post('/refresh', [AuthController::class, 'refresh']);
   // Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});