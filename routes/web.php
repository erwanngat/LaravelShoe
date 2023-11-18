<?php

use App\Models\Shoe;
use App\Http\Controllers\shoesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/shoes', [ShoesController::class, 'index']);
Route::get('/shoes/create', [ShoesController::class, 'create']);
Route::post('/shoes', [ShoesController::class, 'store']);
Route::get('/shoes/{shoe}/edit', [ShoesController::class, 'edit']);
Route::patch('/shoes/{shoe}', [ShoesController::class, 'update']);
Route::delete('/shoes/{shoe}', [ShoesController::class, 'destroy']);
Route::get('/shoes/{shoe}', [ShoesController::class, 'show']  );

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
