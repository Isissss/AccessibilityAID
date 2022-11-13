<?php

namespace App\Http\Controllers;

use App\Models\CompletedChallenge;
use App\Models\User;


use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\DateTime;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::user()){
            $challenge = CompletedChallenge::where('challenge_id', '=', 1)
                ->where('user_id', '=', Auth::user()->id)->first();
            $average1 = $challenge->completed_at->timestamp - $challenge->started_at->timestamp;
            $average = CarbonInterval::seconds($average1)->cascade()->forHumans();
            return view('home',compact('average' ) );
        }else{
            return view('home');
        }






    }

}
