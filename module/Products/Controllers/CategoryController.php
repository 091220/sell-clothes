<?php

namespace Module\Products\Controllers;

use Illuminate\Http\Request;
use Infrastructure\Http\Controller;
use Module\Products\Services\CategoryService;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAll()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.products.categories.index', compact('categories'));
    }

    public function getCreate()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.products.categories.create', compact('categories'));
    }

    public function create(Request $request)
    {
        $category = $request->category;
        $this->categoryService->create($category);
        return redirect('/admin/products/categories');
    }

    public function getEdit($id)
    {
        $category = $this->categoryService->getById($id);
        $categories = $this->categoryService->getAll();
        return view('admin.products.categories.edit', compact('category', 'categories'));
    }

    public function edit(Request $request, $id)
    {
        $category = $request->category;
        $this->categoryService->edit($category, $id);
        return redirect('/admin/products/categories');
    }

    public function delete($id)
    {
        $this->categoryService->delete($id);
        return redirect('/admin/products/categories');
    }

}
