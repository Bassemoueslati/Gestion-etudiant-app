<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantContoller;
use App\Http\Controllers\Api\EtudiantApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

Route::middleware('api')->group(function () {
    // Etudiant API endpoints
    Route::get('/etudiants', [EtudiantApiController::class, 'index']);
    Route::post('/etudiants', [EtudiantApiController::class, 'store']);
    Route::get('/etudiants/{id}', [EtudiantApiController::class, 'show']);
    Route::put('/etudiants/{id}', [EtudiantApiController::class, 'update']);
    Route::delete('/etudiants/{id}', [EtudiantApiController::class, 'destroy']);
    
    // Classes API endpoints
    Route::get('/classes', [App\Http\Controllers\Api\ClasseApiController::class, 'index']);
    Route::post('/classes', [App\Http\Controllers\Api\ClasseApiController::class, 'store']);
    Route::get('/classes/{id}', [App\Http\Controllers\Api\ClasseApiController::class, 'show']);
    Route::put('/classes/{id}', [App\Http\Controllers\Api\ClasseApiController::class, 'update']);
    Route::delete('/classes/{id}', [App\Http\Controllers\Api\ClasseApiController::class, 'destroy']);
    
    // Health check
    Route::get('/health', function () {
        return response()->json(['status' => 'ok', 'message' => 'API is running']);
    });
});
