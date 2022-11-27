<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CompletedChallengeController;
use App\Http\Controllers\PDFController;
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
Route::get('send-email-pdf', PDFController::class);
Route::get('show-email-pdf', function () {

    $rapport = \App\Models\CompletedChallenge::where('user_id', '=', auth()->id())->with('challenge')->orderby('score')->get();



//    return new App\Mail\RapportMail();
    return view('emails.pdf', compact('rapport' ));
});
Route::resource('/challenge', ChallengeController::class);

Route::get('/challenge/{challenge:slug}', [ChallengeController::class, 'show'])->name('challenge.show');;
Route::get('/challenge/{challenge:slug}/finished', [CompletedChallengeController::class, 'show'])->name('completed-challenge.show');
Route::post('/finished/{completed_challenge}', [CompletedChallengeController::class, 'update'])->name('completed-challenge.update');
Route::get('home/start', [TimeController::class, 'start'])->name('time.start');
Route::get('home/end', [TimeController::class, 'end'])->name('time.end');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


