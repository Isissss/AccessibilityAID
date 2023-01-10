<?php

namespace App\Jobs;

use App\Mail\RapportMail;
use App\Models\CompletedChallenge;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
class ProcessRapportEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $session;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->session = auth()->user()->session;
        $this->user = auth()->user();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Collect all challenges for rapport.
        $challenges = CompletedChallenge::where('user_id', '=', $this->user->id)->get();

        Mail::to($this->user->email)->send(new RapportMail($challenges));
    }
}
