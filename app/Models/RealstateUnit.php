<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealstateUnit extends Model
{
    use HasFactory;
    public $guarded = [];
    public function Realstate()
    {
        return $this->belongsTo(Relastate::class);
    }

    public function Unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function FloorNumber()
    {
        $keys = [
            __('translation.1_floor'),
            __('translation.2_floor'),
            __('translation.3_floor'),
            __('translation.4_floor'),
            __('translation.5_floor'),
            __('translation.6_floor'),
            __('translation.7_floor'),
            __('translation.8_floor'),
            __('translation.8_floor'),
            __('translation.10_floor')
        ];
        return $keys[$this->floor_number] ?? 'غير معروف';
    }
}
