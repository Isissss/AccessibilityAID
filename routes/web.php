<?php

use App\Http\Controllers\AdminTips;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CompletedChallengeController;
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

Route::resource('/challenge', ChallengeController::class);

Route::get('/challenge/{challenge:slug}', [ChallengeController::class, 'show'])->name('challenge.show');;
Route::get('/challenge/{challenge:slug}/finished', [CompletedChallengeController::class, 'show'])->name('completed-challenge.show');
Route::post('/finished/{completed_challenge}', [CompletedChallengeController::class, 'update'])->name('completed-challenge.update');
Route::get('home/start', [TimeController::class, 'start'])->name('time.start');
Route::get('home/end', [TimeController::class, 'end'])->name('time.end');

Route::middleware(['auth','role_admin'])->group(function (){
    Route::resource('adminTips', AdminTips::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
