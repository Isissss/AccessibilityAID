<?php

namespace App\Http\Controllers;


use App\Jobs\ProcessRapportEmail;
use App\Models\CompletedChallenge;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request;


class RapportController extends Controller
{

    public function sendRapport()
    {
        // Rate limit getting rapport, 1 per minute in case something goes wrong or someone decides to spam.
        $executed = RateLimiter::attempt(
            'get-rapport:' . auth()->id(),
            $perMinute = 1,
            function () {
                ProcessRapportEmail::dispatch();
            }
        );

        if (!$executed) {
            return redirect(route('challenge.index'))->with('message', 'Rustig aan!');
        }

        return redirect(route('challenge.index'));
    }

    public function downloadRapport(Request $request)
    {
        // Get session through form
        $session = $request->validate([
            'session' => 'required|integer'
        ]);

        $challenges = CompletedChallenge::where('user_id', '=', auth()->id())->where('session', '=', $session)->get();

        //Create pdf and automatically download
        $pdf = new Dompdf();
        $pdf->loadHtml(view('emails.pdf', compact('challenges')));
        $pdf->render();
        $pdf->stream('rapport.pdf');
    }
}
