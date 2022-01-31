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
            'users'        => 'required|array',
            'users.email'  => 'required|email',
        ];
    }

    public function attributes()
    {
        return [
            'user'              => __('user'),
            'user.email'        => __('email'),
        ];
    }
}
