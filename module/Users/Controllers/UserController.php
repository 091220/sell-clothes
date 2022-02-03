<?php

namespace Module\Users\Controllers;

use Module\Users\Requests\CreateUserRequest;
use Infrastructure\Http\Controller;
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

    public function create(CreateUserRequest $request)
    {

    }

}
