<?php

namespace Module\Products\Controllers;

use Illuminate\Http\Request;
use Infrastructure\Http\Controller;
use Module\Products\Services\AttributeService;

class AttributeController extends Controller
{

    protected $attributeService;

    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    public function getAll()
    {
        $attributes = $this->attributeService->getAll();
        return view('admin.products.attributes.index', compact('attributes'));
    }

    public function getCreate()
    {
        return view('admin.products.attributes.create');
    }

    public function create(Request $request)
    {
        $attribute = $request->attribute;
        $this->attributeService->create($attribute);
        return redirect('/admin/products/attributes');
    }

    public function getEdit($id)
    {
        $attribute = $this->attributeService->getById($id);
        return view('admin.products.attributes.edit', compact('attribute'));
    }

    public function edit(Request $request, $id)
    {
        $attribute = $request->attribute;
        $this->attributeService->edit($attribute, $id);
        return redirect('/admin/products/attributes');
    }

    public function delete($id)
    {
        $this->attributeService->delete($id);
        return redirect('/admin/products/attributes');
    }

}
