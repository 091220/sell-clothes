<?php

namespace Module\Products\Models;

use Infrastructure\Database\Eloquent\Model;
use Infrastructure\Database\Traits\Uuids;

class Product extends Model
{

    use Uuids;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

}
