<?php

use App\Http\Controllers\ApiPendidikanOCntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'backend'], function () {
    Route::get('/api_pendidikan', [ApiPendidikanOCntroller::class, 'getAll']);
    Route::get('/api_pendidikan/{id}', [ApiPendidikanOCntroller::class, 'getPen']);
    Route::post('/api_pendidikan', [ApiPendidikanOCntroller::class, 'createPen']);
    Route::put('/api_pendidikan/{id}', [ApiPendidikanOCntroller::class, 'updatePen']);
    Route::delete('/api_pendidikan/{id}', [ApiPendidikanOCntroller::class, 'deletePen']);
});