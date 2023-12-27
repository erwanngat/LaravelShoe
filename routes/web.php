<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\shoesController;

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

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/shoes/create', [ShoesController::class, 'create'])->name('create');
    Route::post('/shoes', [ShoesController::class, 'store']);
    Route::get('/shoes/{shoe}/edit', [ShoesController::class, 'edit']);
    Route::patch('/shoes/{shoe}', [ShoesController::class, 'update']);
    Route::delete('/shoes/{shoe}', [ShoesController::class, 'destroy']);
    Route::get('/shoes/{shoe}/stock', [ShoesController::class, 'shoeStock']);
    Route::get('/shoes/stock', [ShoesController::class,'stock'])->name('stock');
});

Route::get('/shoes', [ShoesController::class, 'index'])->name('shoes');
Route::get('/shoes/{shoe}', [ShoesController::class, 'show']);
Route::get('/', [ShoesController::class, 'index'])->name('shoes');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return redirect('shoes');
        })->name('dashboard');
        Route::get('/panier', [ShoesController::class, 'showPanier'])->name('cart');
        Route::get('/pay', [ShoesController::class, 'pay'])->name('pay');
        Route::post('/buy', [ShoesController::class, 'buy']);
});
