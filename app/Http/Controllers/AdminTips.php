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

    public function edit(Tip $adminTip, Challenge $challenge){


        return view('adminTips.edit', compact('adminTip', 'challenge'));
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

    public function update(Request $request, Tip $adminTip)
    {
        $request->validate([
            'content' => 'required',

        ]);

        $adminTip->update($request->all());

    }

    public function destroy(Tip $adminTip, Challenge $challenge)
    {
        $adminTip->delete();
        return redirect()->route('completed-challenge.show', $challenge)->with('success', 'Tip has been deleted successfully');

    }

}
