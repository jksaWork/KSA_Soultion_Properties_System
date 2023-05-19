<?php

namespace App\Models;

use App\Traits\HasSearchScope;
use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Laratrust\Traits\LaratrustRoleTrait;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    use HasFactory, LaratrustUserTrait, HasStatus, HasSearchScope;
    protected $fillable = [
        "name",
        "password",
        "id_type",
        "id_number",
        "id_image",
        "image",
        "role_id",
        'phone',
        'email',
    ];
    public const IDTYPES = ['passport', 'national_identity', "lodging"];
}
