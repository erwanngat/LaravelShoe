<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShoeController;

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

Route::get('/shoes', [ShoeController::class, 'index']);
Route::get('shoes/{shoe}', [ShoeController::class, 'show']);
Route::post('shoes', [ShoeController::class, 'store']);
Route::patch('shoes/{shoe}', [ShoeController::class, 'update']);
Route::delete('shoes/{shoe}', [ShoeController::class, 'destroy']);
