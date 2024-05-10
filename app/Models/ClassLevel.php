<?php

namespace App\Models;

use App\Models\Material;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassLevel extends Model
{
    use HasFactory;

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
