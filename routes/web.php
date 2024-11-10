<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantContoller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function (){
    Route::get('/etudiant',[EtudiantContoller::class,"index"])->name('etudiant');
    Route::get('/create',[EtudiantContoller::class,'create'])->name('etudiant.create');
    Route::post('/create',[EtudiantContoller::class,'store'])->name('etudiant.ajouter');

    Route::put('/etudiant/{etudiant}',[EtudiantContoller::class,"update"])->name('etudiant.update');
    Route::get('/etudiant/{etudiant}',[EtudiantContoller::class,"edit"])->name('etudiant.edit');

    Route::get('/show/{etudiant}',[EtudiantContoller::class,"show"])->name('etudiant.show');
    Route::delete('/delete/{etudiant}',[EtudiantContoller::class,"delete"])->name('etudiant.delete');
});