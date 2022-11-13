<?php

namespace App\Http\Controllers;

use App\Models\CompletedChallenge;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeController extends Controller
{
    public function index()
    {

    }


    public function start()
    {

        $completedChallenge = CompletedChallenge::where('challenge_id', '=', 1)
            ->where('user_id', '=', Auth::user()->id)
            ->first();
        $completedChallenge->started_at = Carbon::now();
        $completedChallenge->save();

        return redirect('/home');

    }

    public function end()
    {
        $completedChallenge = CompletedChallenge::where('challenge_id', '=', 1)
            ->where('user_id', '=', Auth::user()->id)
            ->first();
        $completedChallenge->completed_at = Carbon::now();
        $completedChallenge->save();

        return redirect('/home');

    }

    //use this in another controller to show results
    /*
    if(Auth::user()){
            $challenge = CompletedChallenge::where('challenge_id', '=', 1)
                ->where('user_id', '=', Auth::user()->id)->first();
            $average1 = $challenge->completed_at->timestamp - $challenge->started_at->timestamp;
            $average = CarbonInterval::seconds($average1)->cascade()->forHumans();
            return view('home',compact('average' ) );
        }else{
            return view('home');
        }


    //Use this as buttons for HTML

@extends('layouts.app')

@section('content')

    @if(\Illuminate\Support\Facades\Auth::user())
    <form action="{{ route('home.start') }}" >
        <button>Start</button>
    </form>

    <form action="{{ route('home.end') }}" >
        <button>End</button>
    </form>


    {{$average}}

@endif


@endsection

    //Routes

Route::get('home/start', [TimeController::class, 'start'])->name('time.start');
Route::get('home/end', [TimeController::class, 'end'])->name('time.end');



    //Goes into CompletedChallenge Model

    protected $casts = [
        'started_at'  => 'datetime',
        'completed_at'=> 'datetime',
    ];

    */




}
