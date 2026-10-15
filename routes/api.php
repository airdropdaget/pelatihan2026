<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

// Route untuk mengambil data user yang sedang login (bawaan Sanctum)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// 🔐 MENAMBAHKAN SANCTUM KE ROUTE GIS DATA
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/geojson-data', [ApiController::class, 'geojson_data'])->name('api.geojson.data');
});