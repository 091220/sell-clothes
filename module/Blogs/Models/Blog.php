<?php

namespace Module\Blogs\Models;

use Illuminate\Database\Eloquent\Model;
use Infrastructure\Database\Traits\Uuids;
use Module\Users\Models\User;

class Blog extends Model
{

    use Uuids;

    protected $guarded = [];

    protected $casts = ['id' => 'string'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
