<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\ScopeController;
use App\Http\Controllers\Api\ScopeGroupController;
use App\Http\Controllers\Api\ScopeStatusController;
use App\Http\Controllers\Api\ScopeTypeController;
use App\Http\Controllers\Api\UserController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::get('user-scope/{user}', [ScopeController::class, 'user']);

Route::apiResource('users', UserController::class);
Route::apiResource('type', ScopeTypeController::class);
Route::apiResource('status', ScopeStatusController::class);
Route::apiResource('scope', ScopeController::class);
Route::apiResource('group', GroupController::class);
Route::apiResource('scope-group', ScopeGroupController::class);

// ## authenticated endpoints ## \\
Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});