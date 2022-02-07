<?php

namespace Module\Products\Repositories;

use Infrastructure\Database\Eloquent\Repository;
use Module\Products\Models\AttributeProduct;

class AttributeProductRepository extends Repository
{

    public function getModel()
    {
        return new AttributeProduct();
    }

}
