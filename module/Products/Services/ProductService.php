<?php

namespace Module\Products\Services;

use Infrastructure\Libraries\HelperFunction;
use Module\Products\Repositories\ProductRepository;

class ProductService
{

    protected $helperFunction;

    protected $productRepository;

    public function __construct(
        HelperFunction $helperFunction,
        ProductRepository $productRepository
    )
    {
        $this->helperFunction    = $helperFunction;
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getModel()->paginate(5);
    }

}
