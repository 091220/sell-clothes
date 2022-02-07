<?php

namespace Module\Products\Controllers;

use Illuminate\Http\Request;
use Infrastructure\Http\Controller;
use Module\Products\Services\AttributeService;
use Module\Products\Services\CategoryService;
use Module\Products\Services\ProductService;

class ProductController extends Controller
{

    protected $productService;

    protected $attributeService;

    protected $categoryService;

    public function __construct(
        ProductService $productService,
        AttributeService $attributeService,
        CategoryService $categoryService
    )
    {
        $this->productService   = $productService;
        $this->attributeService = $attributeService;
        $this->categoryService  = $categoryService;
    }

    public function getAll()
    {
        $products = $this->productService->getAll();
        return view('admin.products.index', compact('products'));
    }

    public function getCreate()
    {
        $attributes = $this->attributeService->getAll();
        $categories = $this->categoryService->getAll();
        return view('admin.products.create', compact('categories', 'attributes'));
    }

    public function create(Request $request)
    {
        $product = $request->product;
        $productDetails = $request->product_details;
        $attributeProducts = $request->attribute_products;
        $this->productService->create($product, $productDetails, $attributeProducts);
        return redirect('/admin/products');
    }

}
