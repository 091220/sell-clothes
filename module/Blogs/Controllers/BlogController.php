<?php

namespace Module\Blogs\Controllers;

use Illuminate\Support\Facades\Auth;
use Infrastructure\Http\Controller;
use Module\Blogs\Requests\CreateBlogRequest;
use Module\Blogs\Services\BlogService;

class BlogController extends Controller
{

    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function getAll()
    {
        $blogs = $this->blogService->getAll();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function getCreate()
    {
        return view('admin.blogs.create');
    }

    public function create(CreateBlogRequest $request)
    {
        $blog = $request->blog;
        $blog['user_id'] = Auth::user()->id;
        $this->blogService->create($blog);
        return redirect('/admin/blogs');
    }

    public function getEdit($id)
    {
        $blog = $this->blogService->getById($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function edit(CreateBlogRequest $request, $id)
    {
        $blog = $request->blog;
        $this->blogService->edit($blog, $id);
        return redirect('/admin/blogs');
    }

    public function delete($id)
    {
        $this->blogService->delete($id);
        return redirect('/admin/blogs');
    }

}
