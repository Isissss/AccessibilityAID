<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\CompletedChallenge;
use App\Models\PersonalFeedback;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CompletedChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($id)
    {
        //
        $results = CompletedChallenge::where('user_id', '=', $id)->get();
        return view('profile.index', compact('results'));
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
        $completedChallenge = CompletedChallenge::findOrFail(Session::get('completed_challenge_id'));
        $completedChallenge->completed_at = Carbon::now();
        $completedChallenge->save();
        }

        $average = $completedChallenge->completed_at->timestamp - $completedChallenge->started_at->timestamp;
        $average = CarbonInterval::seconds($average)->cascade()->forHumans();

        $feedback = PersonalFeedback::find(Session::get('completed_challenge_id'));

        return view('finished.show', compact('challenge', 'average', 'completedChallenge', 'feedback'));
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
        // TO-DO: Rename function and eventually store notes too.

//        $attributes = $request->validate([
//            'rating' => 'nullable|integer|min:1|max:5'
//        ]);
//
//        $completedChallenge->score = $attributes['rating'];
        $feedback = PersonalFeedback::findOrFail($completedChallenge->personal_feedback_id);
        $feedback->feedback_1 = $request->has('feedback_1');
        $feedback->feedback_2 = $request->has('feedback_2');
        $feedback->feedback_3 = $request->has('feedback_3');
        $feedback->feedback_4 = $request->has('feedback_4');
        $feedback->feedback_5 = $request->has('feedback_5');
        $feedback->feedback_6 = $request->has('feedback_6');
        $feedback->update();

        $completedChallenge->update();

        return redirect(route('challenge.index'));
    }
}
