<?php

namespace Module\Products\Repositories;

use Infrastructure\Database\Eloquent\Repository;
use Module\Products\Models\ProductDetail;

class ProductDetailRepository extends Repository
{

    public function getModel()
    {
        return new ProductDetail();
    }

}
