<?php

use App\Http\Controllers\CoffeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('coffee', CoffeeController::class);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
