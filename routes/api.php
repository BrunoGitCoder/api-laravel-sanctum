<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth:sanctum');

Route::apiResource('projects', ProjectController::class)->middleware('auth:sanctum');
Route::apiResource('documents', DocumentController::class)->middleware('auth:sanctum');
Route::apiResource('tasks', TaskController::class)->middleware('auth:sanctum');