<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\FinishedChallengeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/challenge/{challenge:slug}', [ChallengeController::class, 'show'])->name('challenge.show');;
Route::get('/challenge/{challenge:slug}/finished', [FinishedChallengeController::class, 'show'])->name('completed-challenge.show');
Route::post('/finished/{completed_challenge}', [FinishedChallengeController::class, 'update']);
