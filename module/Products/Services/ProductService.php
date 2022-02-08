<?php

namespace Module\Products\Services;

use Infrastructure\Libraries\HelperFunction;
use Module\Products\Repositories\AttributeProductRepository;
use Module\Products\Repositories\ProductDetailRepository;
use Module\Products\Repositories\ProductRepository;

class ProductService
{

    protected $helperFunction;

    protected $productRepository;

    protected $productDetailRepository;

    protected $attributeProductRepository;

    public function __construct(
        HelperFunction $helperFunction,
        ProductRepository $productRepository,
        ProductDetailRepository $productDetailRepository,
        AttributeProductRepository $attributeProductRepository
    )
    {
        $this->helperFunction             = $helperFunction;
        $this->productRepository          = $productRepository;
        $this->productDetailRepository    = $productDetailRepository;
        $this->attributeProductRepository = $attributeProductRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getModel()->paginate(5);
    }

    public function create($product, $productDetails, $attributeProducts)
    {
        \DB::beginTransaction();
        try {
            $productData = $this->productRepository->create($product);
            $productDetailData = [];
            $attributeProductData = [];
            foreach ($productDetails as $key => $productDetail) {
                $productDetail['product_id'] = $productData->id;
                $productDetail['id']         = (string)\Str::uuid();
                $productDetail = $this->helperFunction->saveImage($productDetail,'images');
                $productDetailData[] = $productDetail;
                foreach ($attributeProducts[$key] as $k => $attributeProduct){
                    $attributeProductData[] = [
                        'id' => (string)\Str::uuid(),
                        'product_detail_id' => $productDetail['id'],
                        'attribute_id' => $k,
                        'value' => $attributeProduct,
                    ];
                }
            }
            $this->productDetailRepository->getModel()->insert($productDetailData);
            $this->attributeProductRepository->getModel()->insert($attributeProductData);
            \DB::commit();
        } catch (\Exception $e){
            \DB::rollback();
        }
    }

}
