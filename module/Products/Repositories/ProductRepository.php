<?php

namespace Module\Products\Repositories;

use Infrastructure\Database\Eloquent\Repository;
use Module\Products\Models\Product;

class ProductRepository extends Repository
{

    public function getModel()
    {
        return new Product();
    }

}
