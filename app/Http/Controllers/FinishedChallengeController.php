<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\CompletedChallenge;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FinishedChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Challenge $challenge
     * @return Response
     */
    public function show(Challenge $challenge)
    {
        $challenge1 = CompletedChallenge::where('challenge_id', '=', 1)
            ->where('user_id', '=', Auth::user()->id)->first();
        $average1 = $challenge1->completed_at->timestamp - $challenge1->started_at->timestamp;
        $average = CarbonInterval::seconds($average1)->cascade()->forHumans();

        $completedChallenge = CompletedChallenge::where('challenge_id', '=', $challenge->id)
            ->where('user_id', '=', Auth::user()->id)
            ->first();
        $completedChallenge->completed_at = Carbon::now();
        $completedChallenge->save();
        return view('finished.show', compact('challenge', 'average'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Challenge $challenge
     * @return Response
     */
    public function update(Request $request, CompletedChallenge $completedChallenge)
    {
        $attributes = $request->validate([
            'rating' => 'nullable|integer|min:1|max:5'
        ]);

        $completedChallenge->score = $attributes['rating'];

        $completedChallenge->update();

        return redirect(route('completed-challenge.show', $completedChallenge->challenge));
    }
}
