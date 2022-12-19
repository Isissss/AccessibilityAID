<?php

use App\Http\Controllers\api\ChallengeController;
use App\Http\Controllers\api\CompletedChallengeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('challenge/{challenge:id}', [ChallengeController::class, 'show'])->name('api.challenge');
Route::get('challenge/contrast/finished/{tip:wordpress}', [CompletedChallengeController::class, 'show'])->name('api.completedChallenge');
