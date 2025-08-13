<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::post('/save', [HomeController::class, 'save']);

Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');

Route::put('/update/{id}', [HomeController::class, 'update'])->name('update');

Route::get('/delete/{id}', [HomeController::class, 'delete'])->name('delete');

Route::get('/about', [AboutController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);
