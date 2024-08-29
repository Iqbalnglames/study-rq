<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'answered_questions');
    }

    public function images()
    {
        return $this->belongsToMany(AnswerImage::class, 'answered_questions');
    }
}
