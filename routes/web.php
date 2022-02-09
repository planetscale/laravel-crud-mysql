<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::resource('moods', MoodController::class);
Route::resource('entries', EntryController::class);
