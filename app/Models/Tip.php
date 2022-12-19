<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'challenge_id', 'wordpress'];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
