<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedChallenge extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(Tip::class);
    }

    public $timestamps = false;


}
