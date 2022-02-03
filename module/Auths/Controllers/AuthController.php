<?php

namespace Module\Auths\Controllers;

use Illuminate\Support\Facades\Auth;
use Infrastructure\Http\Controller;
use Module\Auths\Requests\LoginRequest;

class AuthController extends Controller
{

    public function getLogin()
    {
        return view('admin.logins.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request['login']['email'],
            'password' => $request['login']['password'],
            'is_admin' => 1,
        ];
        if(Auth::attempt($credentials)) {
            return redirect('/admin/dashboard');
        }else{
            session()->flash('LoginFail', true);
            return redirect('/admin/login');
        }
    }

}
