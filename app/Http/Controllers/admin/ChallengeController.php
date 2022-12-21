<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\CompletedChallenge;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.challenges.index', ['challenges' => Challenge::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.challenges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('challenges', 'name')],
            'slug' => ['required', 'string', Rule::unique('challenges', 'slug') ],
            'description' => ['required', 'string', 'min:10'],
            'goal' => ['required', 'string', 'min:10'],
            'active' => ['boolean']
        ]);

        $validated['slug'] = Str::slug($validated['slug'], '-');

        Challenge::create($validated);

        return redirect(route('admin.challenge.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        $completed_count = CompletedChallenge::where('challenge_id', $challenge->id)->count();
        return view('admin.challenges.show', compact('challenge', 'completed_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(Challenge $challenge)
    {
        return view('admin.challenges.edit', compact('challenge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challenge $challenge)
    {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('challenges', 'name')->ignore($challenge)],
            'slug' => ['required', 'string', Rule::unique('challenges', 'slug')->ignore($challenge) ],
            'description' => ['required', 'string', 'min:10'],
            'goal' => ['required', 'string', 'min:10'],
            'active' => ['boolean']
        ]);

        $challenge->update($validated);
        $challenge->save();

        return redirect(route('admin.challenge.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge)
    {
        $challenge->delete();

        return redirect(route('admin.challenge.index'))->with('message', 'Challenge has been deleted');
    }

    public function updateVisibility(Request $request, Challenge $challenge)
    {
        $validated = $request->validate([
            'active' => 'required|boolean',
        ]);

        $challenge->update($validated);
    }
}
