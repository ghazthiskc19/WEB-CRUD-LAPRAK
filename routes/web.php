<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformationController;


Route::get('/login', function () {
    return view('login');
})->name('login');
    
Route::get('/', [InformationController::class, 'getAllList'])->name('home');

Route::get('/informasi/form/{id?}', [InformationController::class, 'showFormAction'])->name("info.form");

Route::post('/informasi', [InformationController::class, 'addListInformation'] )->name("info.create");

Route::put('/informasi/{id}', [InformationController::class, 'updateListInformation'])->name("info.update");

Route::delete('/informasi/{id}', [InformationController::class, 'deleteListInformation'] )->name(('info.delete'));

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

