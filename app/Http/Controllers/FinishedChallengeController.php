<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\CompletedChallenge;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        return view('finished.show', compact('challenge'));
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

        return redirect(route('home'));
    }
}
