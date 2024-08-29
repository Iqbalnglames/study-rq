<?php

namespace App\Models;

use App\Enums\AnswerType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $cast = AnswerType::class;

    protected $guarded = [];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function attendances()
    {
        return $this->belongsToMany(Attendance::class, 'answered_questions');
    }
}
