<?php

namespace Api\Locations\Repositories;

use Api\Locations\Models\Location;
use Infrastructure\Database\Eloquent\Repository;

class LocationRepository extends Repository
{

    public function getModel()
    {
        return new Location();
    }

}
