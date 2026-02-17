<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

