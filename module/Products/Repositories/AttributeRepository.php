<?php

namespace Module\Products\Repositories;

use Infrastructure\Database\Eloquent\Repository;
use Module\Products\Models\Attribute;

class AttributeRepository extends Repository
{

    public function getModel()
    {
        return new Attribute();
    }

}
