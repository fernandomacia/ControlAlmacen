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

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/misPrestamos', [UserController::class, 'misPrestamos']);
    Route::post('/prestamo', [UserController::class, 'prestamo']);
});

Route::group(['middleware' => ['auth:sanctum', 'role:Administrador,Encargado']], function () {
    Route::get('/getUsers', [AdminController::class, 'getUsers']);
    Route::get('/getDepartamentos', [AdminController::class, 'getDepartamentos']);
    Route::get('/getArticulos', [AdminController::class, 'getArticulos']);
    Route::get('/getPrestamos', [AdminController::class, 'getArticulos']);
    Route::post('/register', [AdminController::class, 'register']);
    Route::post('/devolucion', [AdminController::class, 'devolucion']);
});
