<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ShowsController;

Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');

Route::get('/tv-shows', [ShowsController::class, 'index'])->name('tv-shows.index');
Route::get('/tv-shows/{id}', [ShowsController::class, 'show'])->name('tv-shows.show');
