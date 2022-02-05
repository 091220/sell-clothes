<?php

namespace Module\Products\Models;

use Infrastructure\Database\Eloquent\Model;
use Infrastructure\Database\Traits\Uuids;

class Attribute extends Model
{

    use Uuids;

    protected $guarded = [];

    protected $casts = ['id' => 'string'];

}
