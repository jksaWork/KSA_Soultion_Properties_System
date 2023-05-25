<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory, HasStatus;
    public $fillable = ['name', 'area_id', 'status'];


    public function Realstates()
    {
        return $this->hasMany(Realstate::class, 'owner_id');
    }
}
