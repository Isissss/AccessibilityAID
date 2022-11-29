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


        return redirect('/challenge/Contrast/finished');
    }

    public function update(Request $request, Tip $adminTip)
    {
        $challenge = $adminTip->challenge->name;

        $request->validate([
            'content' => 'required',

        ]);

        $adminTip->update($request->all());

        return redirect(route('completed-challenge.show', $challenge));


    }

    public function destroy(Tip $adminTip)
    {
        $challenge = $adminTip->challenge->name;

        $adminTip->delete();

        return redirect(route('completed-challenge.show', $challenge));

    }

}
