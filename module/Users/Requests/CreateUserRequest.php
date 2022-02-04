<?php

namespace Module\Users\Requests;

use Infrastructure\Http\ApiRequest;

class CreateUserRequest extends ApiRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user'                   => 'required|array',
            'user.email'             => 'required|email',
            'user.password'          => 'required',
            'user.name'              => 'required',
            'user.phone'             => 'required',
            'user.is_admin'          => 'required',
            'user.is_locked'         => 'required',
            'user.location_details'  => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'user'                         => __('user'),
            'user.email'                   => __('email'),
            'user.password'                => __('user.password'),
            'user.name'                    => __('name'),
            'user.phone'                   => __('phone'),
            'user.is_admin'                => __('is_admin'),
            'user.is_locked'               => __('is_locked'),
            'user.location_details'        => __('location_details'),
        ];
    }

}
