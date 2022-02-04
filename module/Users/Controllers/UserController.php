<?php

namespace Module\Users\Controllers;

use Module\Users\Requests\CreateUserRequest;
use Infrastructure\Http\Controller;
use Module\Users\Requests\EditUserRequest;
use Module\Users\Services\UserService;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getDashBoard()
    {
        return view('admin.logins.dashboard');
    }

    public function getAll()
    {
        $users = $this->userService->getAll();
        return view('admin.users.index', compact('users'));
    }

    public function getCreate()
    {
        return view('admin.users.create');
    }

    public function create(CreateUserRequest $request)
    {
        $user = $request->user;
        $this->userService->create($user);
        return redirect('/admin/users');
    }

    public function getEdit($id)
    {
        $user = $this->userService->getById($id);
        return view('admin.users.edit', compact('user'));
    }

    public function edit(EditUserRequest $request, $id)
    {
        $user = $request->user;
        $this->userService->edit($user, $id);
        return redirect('/admin/users');
    }

    public function delete($id)
    {
        $this->userService->delete($id);
        return redirect('/admin/users');
    }

    public function lock($id)
    {
        $this->userService->lock($id);
        return redirect('/admin/users');
    }

}
