<?php

use App\Http\Controllers\TodosController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;

Route::get('/offline', [TodosController::class, 'offline']);
Route::get('/', [TodosController::class, 'index']);
Route::post('/store', [TodosController::class, 'store']);
Route::post('/{id}', [TodosController::class, 'toggleCompleted']);
Route::get('/edit/{id}', [TodosController::class, 'edit']);
Route::patch('/update/{id}', [TodosController::class, 'update']);
Route::delete('/destroy/{id}', [TodosController::class, 'destroy']);
#Route::show('/show/{id}', [TodosController::class, 'show']);
Route::resource('/', TodosController::class);