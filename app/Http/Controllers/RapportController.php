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
        $session = $request->validate([
            'session' => 'required|integer'
        ]);

        $rapport = CompletedChallenge::where('user_id', '=', auth()->id())->where('session', '=', $session)->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('emails.pdf', compact('rapport')));
        $pdf->render();
        $pdf->stream('rapport.pdf');
    }
}
