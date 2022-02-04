<?php

namespace Module\Blogs\Repositories;

use Infrastructure\Database\Eloquent\Repository;
use Module\Blogs\Models\Blog;

class BlogRepository extends Repository
{

    public function getModel()
    {
        return new Blog();
    }

}
