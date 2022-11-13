<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedChallenge extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'challenge_id', 'score', 'notes'];
    protected $casts = [
        'started_at'  => 'datetime',
        'completed_at'=> 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(Tip::class);
    }

    public $timestamps = false;


}
