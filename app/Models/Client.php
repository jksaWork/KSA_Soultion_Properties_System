<?php

namespace App\Models;

use App\Traits\HasSearchScope;
use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasFactory, HasApiTokens, HasStatus, HasSearchScope;
    protected $guarded = [];

    public function attachments()
    {
        return $this->morphMany(Attachments::class, 'attachable');
    }

    public function Nationalaity()
    {
        return $this->belongsTo(Nationaltiy::class, 'nationalaity_id');
    }

    public function FavorateOffers()
    {
        return $this->belongsToMany(Offer::class,  'favoarate_offers', 'client_id', 'offer_id');
    }
    public function isFavorate($id)
    {
        $ids = $this->FavorateOffers->pluck('id');
        return in_array($id, $ids);
    }

    public function Province()
    {
        return $this->belongsTo(Province::class);
    }
    public function SubArea()
    {
        return $this->belongsTo(SubArea::class, 'subarea_id');
    }
    public function Contracts()
    {
        // return $this->hasMany()
    }
}
