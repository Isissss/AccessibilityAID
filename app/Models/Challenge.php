<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $hidden = ['created_at', 'updated_at', 'active'];

    public function tips()
    {
        return $this->hasMany(Tip::class);
    }


}
