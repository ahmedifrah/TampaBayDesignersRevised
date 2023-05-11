<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GroupController;
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

Route::get('/events', [EventController::class, 'index']);
Route::get('/groups', [GroupController::class, 'index']);
Route::get('/faqs', [FaqController::class, 'index']);

Route::post('/events', [EventController::class, 'store']);
Route::post('/faqs', [FaqController::class, 'store']);
Route::post('/groups', [GroupController::class, 'store']);


Route::put('/events/{id}', [EventController::class, 'update']);
Route::put('/groups/{id}', [GroupController::class, 'update']);
Route::put('/faqs/{id}', [FaqController::class, 'update']);

Route::delete('/events/{id}', [EventController::class, 'destroy']);
Route::delete('/groups/{id}', [GroupController::class, 'destroy']);
Route::delete('/faqs/{id}', [FaqController::class, 'destroy']);