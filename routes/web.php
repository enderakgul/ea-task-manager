<?php

use App\Http\Controllers\AssigmentController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::post('/assign', [AssigmentController::class, 'assign'])->name('assign');
