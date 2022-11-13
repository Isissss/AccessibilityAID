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
}
