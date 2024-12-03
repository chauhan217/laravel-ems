<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalkProposalController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', function () {
    return view('welcome');
});

// Talk Proposal Routes
Route::get('/talk-proposals/create', [TalkProposalController::class, 'create'])->name('talk_proposals.create');
Route::post('/talk-proposals', [TalkProposalController::class, 'store'])->name('talk_proposals.store');

// Review Routes
Route::get('/reviews/dashboard', [ReviewController::class, 'dashboard'])->name('reviews.dashboard');
Route::get('/reviews/{talkProposal}/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
