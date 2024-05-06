<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\ProjectController;
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

// API routes
// Projects
Route::get('/projects', [ProjectController::class, 'index']);
// Front end data for db storage
Route::post('/new-contact', [LeadController::class, 'store']);


// rotta per la show del singolo post
Route::get('/projects/{id}', [ProjectController::class, 'show']);

