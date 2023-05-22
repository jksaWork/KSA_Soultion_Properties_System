<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    use HasFactory, HasStatus;
    public $fillable = ['name', 'area_id', 'province_id'];
    public function Area()
    {
        return $this->belongsTo(Area::class);
    }
    public function Province()
    {
        return $this->belongsTo(Province::class);
    }
}
