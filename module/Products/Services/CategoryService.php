<?php

namespace Module\Products\Services;

use Module\Products\Repositories\CategoryRepository;

class CategoryService
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getModel()->paginate(5);
    }

    public function create($category)
    {
        $this->categoryRepository->create($category);
    }

    public function getById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function edit($category, $id)
    {
        $this->categoryRepository->getById($id)->update($category);
    }

    public function delete($id)
    {
        $this->categoryRepository->getById($id)->delete();
    }

}
