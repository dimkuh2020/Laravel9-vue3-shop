<?php

use App\Http\Controllers\API\Product\ProductIndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductIndexController::class, '__invoke']);
