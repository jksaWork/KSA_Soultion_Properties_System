<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory, HasStatus;
    public $fillable = ['name', 'status'];

    public function RealState()
    {
        return $this->hasMany(Realstate::class);
    }
}
