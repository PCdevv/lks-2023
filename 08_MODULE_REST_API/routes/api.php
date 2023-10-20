<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\ValidationController;
use App\Http\Middleware\IsLoginTokenValid;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout']);


Route::get('/validations', [ValidationController::class, 'index'])->middleware(IsLoginTokenValid::class);
Route::post('/validation', [ValidationController::class, 'store'])->middleware(IsLoginTokenValid::class);

Route::get('/job_vacancies', [JobVacancyController::class, 'index'])->middleware(IsLoginTokenValid::class);
Route::get('/job_vacancies/{id}', [ValidationController::class, 'index'])->middleware(IsLoginTokenValid::class);