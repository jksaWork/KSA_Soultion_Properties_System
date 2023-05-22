<?php

namespace App\Models;

use App\Traits\HasSearchScope;
use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    use HasFactory, HasApiTokens, HasSearchScope, HasStatus;
    protected $fillable = [
        'name',
        'email',
        'address',
        'status',
        'phone',
        'subarea_id',
        'iban_number',
        'id_number',
        'province_id',
        'bank_id',
        'note',
    ];


    // relation Owners With His Agent If Has Agent
    public function Agent()
    {
        return $this->belongsTo(Agent::class);
    }


    // Scopes When Agent User Is Usgin
    public function scopeWhenAgentUser($q)
    {
        if (auth()->guard('web')->check()) {
            return $q->where('agent_id', auth()->user()->agent_id);
        } else {
            return $q;
        }
    }
    public function attachments()
    {
        return $this->morphMany(Attachments::class, 'attachable');
    }

    public function Realstates()
    {
        return $this->hasMany(Realstate::class, 'owner_id');
    }

    public function Bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function Province()
    {
        return $this->belongsTo(Province::class);
    }
    public function SubArea()
    {
        return $this->belongsTo(SubArea::class, 'subarea_id');
    }
}
