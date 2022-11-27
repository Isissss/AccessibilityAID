<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Tip;
use Illuminate\Http\Request;

class AdminTips extends Controller
{

    public function create(Tip $admin){

        return view('adminTips.create', compact('admin'));
    }

    public function edit(Tip $admin){


        return view('adminTips.edit', compact('admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
             'challenge_id' => 'required',
        ]);

        Tip::create($request->post());



        return redirect()->route('weapons.index')->with('success', 'Tip has been created successfully.');
    }

    public function update(Request $request, Tip $admin, Challenge $challenge)
    {
        $request->validate([
            'content' => 'required',

        ]);

        $admin->update($request->all());

        return redirect()->route('completed-challenge.show')->with('success', 'Tip Has Been updated successfully');
    }

    public function destroy(Tip $tip, Challenge $challenge)
    {
        $tip->delete();
        return redirect()->route('completed-challenge.show', $challenge)->with('success', 'Build has been deleted successfully');

    }

}
