<?php

namespace Module\Users\Controllers;

use Module\Users\Requests\CreateUserRequest;
use Infrastructure\Http\Controller;

class UserController extends Controller{

    public function getAll()
    {
        return view('admin.users.index');
    }

    public function createUser(CreateUserRequest $request)
    {
        
    }
}