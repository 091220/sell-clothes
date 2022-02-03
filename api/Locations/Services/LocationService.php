<?php

namespace Api\Locations\Services;

use Api\Locations\Repositories\LocationRepository;

class LocationService
{

    protected $locationRepository;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function getAll($options = [])
    {
        return $this->locationRepository->getWhereArrayWithPagination([], 'locations', $options);
    }

}
