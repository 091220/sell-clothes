<?php

namespace Module\Users\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Infrastructure\Database\Traits\Uuids;

class User extends Authenticatable
{

    use Uuids;

    protected $guarded = [];

    protected $hidden = [    // don't get field in array
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)    // set password -> bcrypt when insert or update
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_BCRYPT);
    }

}
