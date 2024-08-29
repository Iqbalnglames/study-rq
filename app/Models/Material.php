<?php

namespace App\Models;

use App\Models\ClassLevel;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasTrixRichText;

    protected $guarded = ['id'];

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class);
    }

    public function questionTitle()
    {
        return $this->hasMany(QuestionTitle::class);
    }
}
