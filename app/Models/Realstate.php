<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realstate extends Model
{
    use HasFactory, HasStatus;
    public $guarded = [];

    public function attachments()
    {
        return $this->morphMany(Attachments::class, 'attachable');
    }

    public function SubArea()
    {
        return $this->belongsTo(SubArea::class, 'subarea_id');
    }

    public function Province()
    {
        return $this->belongsTo(Province::class);
    }

    public function Unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function Owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function Spectator()
    {
        return $this->belongsTo(Owner::class);
    }

    public function Agnet()
    {
        return $this->belongsTo(Owner::class);
    }
}
