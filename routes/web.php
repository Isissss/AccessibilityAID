<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\FinishedChallengeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TimeController;
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

Route::get('home/start', [TimeController::class, 'start'])->name('home.start');
Route::get('home/end', [TimeController::class, 'end'])->name('home.end');


Route::get('/challenge/{challenge:slug}', [ChallengeController::class, 'show']);

Route::get('/challenge/{challenge:slug}/finished', [FinishedChallengeController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
