<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory, HasStatus;
    protected $guarded = [];

    public function SubAreas()
    {
        return $this->hasMany(SubArea::class);
    }

    public function Provinces()
    {
        return $this->hasMany(Province::class);
    }
}
