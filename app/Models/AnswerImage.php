<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attendances()
    {
        return $this->belongsToMany(Attendance::class, 'answered_questions');
    }
}
