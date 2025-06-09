<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'index']);
Route::post('/viewed', [VisitorController::class, 'markViewed']);
