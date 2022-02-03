<?php

namespace Api\Locations\Controllers;

use Api\Locations\Services\LocationService;
use Infrastructure\Http\Controller;
use Infrastructure\Libraries\Response;

class LocationController extends Controller
{

    protected $locationService;

    protected $response;

    public function __construct(LocationService $locationService, Response $response)
    {
        $this->locationService  =  $locationService;
        $this->response         =  $response;
    }

    public function getAll()
    {
        $resourceOption = $this->parseResourceOptions();
//        dd($resourceOption);
        $data = $this->locationService->getAll($resourceOption);
        return $this->response->renderSuccess('LWS001', $data);
    }

}
