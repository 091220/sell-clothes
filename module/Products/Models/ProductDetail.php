<?php

namespace Module\Products\Models;

use Infrastructure\Database\Eloquent\Model;
use Infrastructure\Database\Traits\Uuids;

class ProductDetail extends Model
{

    use Uuids;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeProducts()
    {
        return $this->hasMany(AttributeProduct::class);
    }

}
