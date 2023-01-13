<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\CompletedChallenge;
use App\Models\PersonalFeedback;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $challenges = Challenge::where('active', true)->get();
        return view('challenge.index', compact('challenges'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     */
    public function show(Challenge $challenge)
    {
        if (!$challenge->active && !auth()->user()?->admin) {
            abort(404);
        }

        $personalFeedback = new PersonalFeedback;
        $personalFeedback->save();
        $completedChallenge = new CompletedChallenge([
            'user_id' => auth()->id(),
            'challenge_id' => $challenge->id,
            'personal_feedback_id' => $personalFeedback?->id,
            'started_at' => Carbon::now()
        ]);
        $completedChallenge->save();
        Session::put('completed_challenge_id', $completedChallenge->id);

	$challengeName = strtolower($challenge->name);
	 
        if (!view::exists("challenge.challenges.{$challengeName}")) {
            abort(404);
        }

        return view("challenge.challenges.{$challengeName}", compact('challenge'));
    }

