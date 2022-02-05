<?php

namespace Module\Products\Services;

use Module\Products\Repositories\AttributeRepository;

class AttributeService
{

    protected $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function getAll()
    {
        return $this->attributeRepository->getModel()->paginate(5);
    }

    public function create($attribute)
    {
        $this->attributeRepository->create($attribute);
    }

    public function getById($id)
    {
        return $this->attributeRepository->getById($id);
    }

    public function edit($attribute, $id)
    {
        $this->attributeRepository->getById($id)->update($attribute);
    }

    public function delete($id)
    {
        $this->attributeRepository->getById($id)->delete();
    }

}
