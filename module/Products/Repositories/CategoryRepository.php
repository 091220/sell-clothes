<?php

namespace Module\Products\Repositories;

use Infrastructure\Database\Eloquent\Repository;
use Module\Products\Models\Category;

class CategoryRepository extends Repository
{

    public function getModel()
    {
        return new Category();
    }

}
