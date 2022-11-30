<?php

namespace App\Models;

use Faker\Provider\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedChallenge extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'started_at'  => 'datetime',
        'completed_at'=> 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(Tip::class);
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function personalFeedback()
    {
        return $this->hasOne(PersonalFeedback::class);
    }

}
