<?php

namespace Module\Blogs\Models;

use Infrastructure\Database\Eloquent\Model;
use Infrastructure\Database\Traits\Uuids;
use Module\Users\Models\User;

class Blog extends Model
{

    use Uuids;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
