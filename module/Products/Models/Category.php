<?php

namespace Module\Products\Models;

use Infrastructure\Database\Eloquent\Model;
use Infrastructure\Database\Traits\Uuids;

class Category extends Model
{

    use Uuids;

    protected $guarded = [];

}
