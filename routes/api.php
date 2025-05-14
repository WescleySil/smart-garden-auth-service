<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/is-logged-in', [AuthController::class, 'isLoggedIn'])->middleware('auth:sanctum');

Route::prefix('users')->name('users.')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [UserController::class, 'store']);
    Route::get('/', [UserController::class, 'index']);
    Route::delete('/{user}', [UserController::class, 'destroy']);
});
