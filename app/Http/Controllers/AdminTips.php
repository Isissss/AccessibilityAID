<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Tip;
use Illuminate\Http\Request;

class AdminTips extends Controller
{

    public function create(Tip $admin, Request $request){


        return view('adminTips.create', compact('admin' , 'request'));
    }

    public function edit(Tip $adminTip, Challenge $challenge){


        return view('adminTips.edit', compact('adminTip', 'challenge'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'content' => 'required',
            'challenge_id' => 'required',
        ]);

        $tip = Tip::create($attributes);


        return redirect(route('completed-challenge.show', $tip->challenge));
    }

    public function update(Request $request, Tip $adminTip)
    {
        $request->validate([
            'content' => 'required',

        ]);

        $adminTip->update($request->all());

        return redirect(route('completed-challenge.show', $adminTip->challenge));


    }

    public function destroy(Tip $adminTip)
    {;
        $adminTip->delete();

        return redirect(route('completed-challenge.show', $adminTip->challenge));

    }

}
