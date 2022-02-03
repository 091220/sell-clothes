<?php

namespace Module\Auths\Requests;

use Infrastructure\Http\ApiRequest;

class LoginRequest extends ApiRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'login'              => 'required|array',
            'login.email'        => 'required|email',
            'login.password'     => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'login'              => __('login'),
            'login.email'        => __('email'),
            'login.password'     => __('password'),
        ];
    }

}
