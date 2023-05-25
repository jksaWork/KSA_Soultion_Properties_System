<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achivement extends Model
{
    use HasFactory;
    public $guarded = [];
    const  TYPES = [
        'pay',
        'penalty',
        'amnesty',
    ];


    public function Realstate()
    {
        return $this->belongsTo(Realstate::class, 'realstate_id');
    }

    public function Client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function attachments()
    {
        return $this->morphMany(Attachments::class, 'attachable');
    }

    public function Contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
