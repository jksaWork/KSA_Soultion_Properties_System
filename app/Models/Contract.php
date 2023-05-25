<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class ContractAbstract extends Model
{
    use  HasStatus;
}
class Contract extends ContractAbstract
{

    public $status_filed = 'contract_active';
    use HasFactory;
    const PAYMENTSWAYS = ['annual', 'semi-annual', 'quarterly', 'monthly'];
    public $guarded = [];
    public function attachments()
    {
        return $this->morphMany(Attachments::class, 'attachable');
    }

    public function Realstate()
    {
        return $this->belongsTo(Realstate::class, 'realstate_id');
    }

    public function Client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function RealStateUnits()
    {
        return $this->belongsToMany(RealstateUnit::class,  'contracts_units', 'contract_id', 'unit_id');
    }
}
