<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantContoller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Simple API-like responses for web
Route::get('/', function () {
    return response()->json([
        'app' => 'Gestion Etudiant',
        'version' => '1.0.0',
        'message' => 'Welcome to Gestion Etudiant API'
    ]);
});

Route::group(['middleware' => ['auth']], function (){
    Route::get('/etudiant', [EtudiantContoller::class, "index"])->name('etudiant');
    Route::post('/etudiant', [EtudiantContoller::class, "store"])->name('etudiant.store');
    Route::put('/etudiant/{etudiant}', [EtudiantContoller::class, "update"])->name('etudiant.update');
    Route::get('/etudiant/{etudiant}', [EtudiantContoller::class, "show"])->name('etudiant.show');
    Route::delete('/etudiant/{etudiant}', [EtudiantContoller::class, "delete"])->name('etudiant.delete');
});
