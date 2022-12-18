<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalFeedback extends Model
{
    use HasFactory;

    protected $table = 'personal_feedbacks';

    protected $fillable = [
        'feedback_1',
        'feedback_2',
        'feedback_3',
        'feedback_4',
        'feedback_5',
        'feedback_6',
    ];

    protected $guarded = [
        'id'
    ];

    public function completedChallenge()
    {
        return $this->belongsTo(CompletedChallenge::class);
    }
}
