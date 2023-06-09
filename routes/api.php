<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

// Route::get('/clients', [ClientController::class, 'index']);
// Route::post('/clients', [ClientController::class, 'store']);
// Route::put('/clients/{client}', [ClientController::class, 'update']);
// Route::delete('/clients/{client}', [ClientController::class, 'destroy']);

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::post('/', [ClientController::class, 'store']);
    Route::get('/{client}', [ClientController::class, 'show']);
    Route::post('/{client}', [ClientController::class, 'update']); //PUT
    Route::delete('/{client}', [ClientController::class, 'destroy']);
});

