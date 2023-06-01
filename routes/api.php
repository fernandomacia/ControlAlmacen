<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::group(['middleware' => ['auth:sanctum', 'role:Administrador,Encargado']], function () {
    Route::post('/getUsers', [AdminController::class, 'getUsers']);
    Route::post('/getDepartamentos', [AdminController::class, 'getDepartamentos']);
    Route::post('/getArticulos', [AdminController::class, 'getArticulos']);
    Route::post('/register', [AdminController::class, 'register']);
});
