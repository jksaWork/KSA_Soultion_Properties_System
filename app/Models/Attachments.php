<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function attachable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute($key)
    {
        switch ($this->attachable_type) {
            case 'App\Models\Owner':
                return  asset('owner/attachments/' . $key);
            case 'App\Models\RealState':
                return  asset('realstates/attachemnts/' . $key);

            case 'App\Models\StudentRevenue':
                return  asset('revenue/attachments/' . $key);

            default:
                return asset('agents/attachments/' . $key);;
        }
    }

    public  static function AttachMUltiFIleFiles($files, Model $model, string $disc)
    {
        if (count($files) > 0) {
            foreach ($files as $key => $value) {
                $name = $value->hashName();
                $value->store($disc, 'public');
                // I Do This For First Step
                $attachment  = new Attachments;
                // $attachment->attacheable = $agent->id;
                $attachment->url = $name;
                $model->attachments()->save($attachment);
            }
            return true;
        }
    }

    public static function getAttachableModel($type): array
    {
        switch ($type) {
            case 'owner':
                return [Owner::class, 'owners.show', 'owner'];

            case 'renvue':
                return [StudentRevenue::class, 'school.students.revenues.show', 'revenue'];

            case 'realstate':
                return [RealState::class, 'realstate.show', 'realstate'];
            default:
                return [Owner::class, 'owners.show', 'owner'];
        }
    }
}
