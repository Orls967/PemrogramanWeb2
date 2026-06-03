<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/experience/{id}', [HomeController::class, 'experience']);