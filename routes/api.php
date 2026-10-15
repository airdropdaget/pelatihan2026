<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route untuk Login (Menghasilkan Token Sanctum)
Route::post('/login', [AuthController::class, 'login']);

// Route GeoJSON yang diproteksi Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/geojson-data', [ApiController::class, 'geojson_data'])->name('api.geojson.data');
    
    // Contoh route user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});