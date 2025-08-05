<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiseaseDataBankController;
use App\Http\Middleware\FirebaseAuth;
use Illuminate\Http\Request;

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/reset-password', [AuthController::class, 'reset']);

Route::middleware(FirebaseAuth::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'getCharts'])->name('dashboard');

    
    /*Route::get('/diseases', [DiseaseController::class, 'getDisease'])->name('diseases');
    Route::get('/diseases/{id}/view', [DiseaseController::class, 'view']);
    Route::post('/diseases', [DiseaseController::class, 'storeDisease'])->name('disease.store');
    Route::get('/diseases/{id}/edit', [DiseaseController::class, 'getDiseaseById'])->name('disease.edit');
    Route::put('/disease/{disease}', [DiseaseController::class, 'updateDisease'])->name('disease.update');
    Route::delete('/diseases/{disease}', [DiseaseController::class, 'destroy'])->name('disease.destroy');*/
    


    Route::get('/detection-results', [DiseaseController::class, 'index'])->name('detection.results');
    Route::get('/disease/{id}', [DiseaseController::class, 'view'])->name('disease.view');
    Route::get('/disease', [DiseaseController::class, 'index'])->name('disease.index');
    Route::get('/disease/{id}', [DiseaseController::class, 'view'])->name('disease.view');
    


    Route::get('/users', [UserController::class, 'getUsers'])->name('users');
    Route::get('/users/{id}/view', [UserController::class, 'getUserById'])->name('user.view-users-info');
    Route::post('/users', [UserController::class, 'storeUser'])->name('user.store');
    Route::put('/users/{user}', [UserController::class, 'updateUser'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/disease-databank', [DiseaseDataBankController::class, 'index'])->name('disease.databank');
    Route::get('/disease-databank/{id}', [DiseaseDataBankController::class, 'show'])->name('disease.databank.view');
    Route::get('/disease-databank/edit/{id}', [DiseaseDatabankController::class, 'edit'])->name('disease.databank.edit');
    Route::put('/disease-databank/update/{id}', [DiseaseDatabankController::class, 'update'])->name('disease.databank.update');





    Route::get('/profile', [AuthController::class, 'viewProfile'])->name('profile');
});
Route::get('/pages', [App\Http\Controllers\MonitoringController::class, 'index'])->name('pages.index');

