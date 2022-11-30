<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CompletedChallengeController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Auth;
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
});
Route::get('rapport-send', [RapportController::class, 'sendRapport'])->middleware('auth')->name('send-rapport');
Route::get('rapport-download', [RapportController::class, 'downloadRapport'])->middleware('auth')->name('download-rapport');

Route::resource('/challenge', ChallengeController::class);

Route::get('/challenge/{challenge:slug}', [ChallengeController::class, 'show'])->name('challenge.show');;
Route::get('/challenge/{challenge:slug}/finished', [CompletedChallengeController::class, 'show'])->name('completed-challenge.show');
Route::put('/finished/{completed_challenge}', [CompletedChallengeController::class, 'update'])->name('completed-challenge.update');
Route::get('/{user:id}/results', [CompletedChallengeController::class, 'index'])->name('completed-challenge.index');
Route::get('home/start', [TimeController::class, 'start'])->name('time.start');
Route::get('home/end', [TimeController::class, 'end'])->name('time.end');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


