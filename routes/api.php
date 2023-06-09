<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/misPrestamos', [UserController::class, 'misPrestamos']);
    Route::post('/prestamo', [UserController::class, 'prestamo']);
});

Route::group(['middleware' => ['auth:sanctum', 'role:Administrador,Encargado']], function () {
    Route::post('/getUsers', [AdminController::class, 'getUsers']);
    Route::post('/getDepartamentos', [AdminController::class, 'getDepartamentos']);
    Route::post('/getArticulos', [AdminController::class, 'getArticulos']);
    Route::post('/getAllPrestamos', [AdminController::class, 'getAllPrestamos']);
    Route::post('/getPrestamos', [AdminController::class, 'getPrestamos']);
    Route::post('/devolucion', [AdminController::class, 'devolucion']);
});
