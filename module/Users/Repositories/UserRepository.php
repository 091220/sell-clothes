<?php

namespace Module\Users\Repositories;

use Infrastructure\Database\Eloquent\Repository;
use Module\Users\Models\User;

class UserRepository extends Repository
{

    public function getModel()
    {
        return new User();
    }

}
