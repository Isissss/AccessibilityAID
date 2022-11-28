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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $challenges = CompletedChallenge::where('user_id', '=', $this->user->id)->get();

        Mail::to($this->user->email)->send(new RapportMail($challenges));
    }
}
