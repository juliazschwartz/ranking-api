<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\AthleteController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\PersonalRecordController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ranking/{movementId}', [RankingController::class, 'getRanking']);

// Rotas CRUD para Athlete
Route::apiResource('athletes',AthleteController::class);

//CRUD routes for movements
Route::apiResource('movements',MovementController::class);

//CRUD for records(values)
Route::apiResource('personal_records', PersonalRecordController::class);
