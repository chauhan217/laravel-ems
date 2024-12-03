<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalkProposalController;
use App\Http\Controllers\ReviewController;


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

Route::get('/talk-proposals', [TalkProposalController::class, 'index']);
Route::get('/talk-proposals/{id}', [TalkProposalController::class, 'show']);
Route::get('/talk-proposals/{id}/reviews', [ReviewController::class, 'getReviews']);
Route::get('/talk-proposals/statistics', [TalkProposalController::class, 'statistics']);
Route::post('/reviews', [ReviewController::class, 'store']);

