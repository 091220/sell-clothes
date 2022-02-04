<?php

namespace Module\Blogs\Services;

use Module\Blogs\Repositories\BlogRepository;

class BlogService
{

    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getAll()
    {
        return $this->blogRepository->getModel()->paginate(5);
    }

    public function create($blog)
    {
        $this->blogRepository->create($blog);
    }

    public function getById($id)
    {
        return $this->blogRepository->getById($id);
    }

    public function edit($blog, $id)
    {
        $this->blogRepository->getById($id)->update($blog);
    }

    public function delete($id)
    {
        $this->blogRepository->getById($id)->delete();
    }

}
