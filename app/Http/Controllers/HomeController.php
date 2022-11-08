<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Weapon;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $average1 = auth()->user()->ended_at->timestamp - auth()->user()->started_at->timestamp;
        $average = CarbonInterval::seconds($average1)->cascade()->forHumans();

        return view('home',compact('average' ) );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'weapon_1' => 'required',
            'weapon_2' => 'required',
            'description' => 'required',

        ]);

        User::create($request->post());


        return redirect()->route('home');
    }

    public function start()
    {

        $user = Auth::user();
        $user->started_at = Carbon::now();
        $user->save();

        return redirect('/home');

    }

    public function end()
    {

        $user = Auth::user();
        $user->ended_at = Carbon::now();
        $user->save();

        return redirect('/home');

    }
}
