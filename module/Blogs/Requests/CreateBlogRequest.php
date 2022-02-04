<?php

namespace Module\Blogs\Requests;

use Infrastructure\Http\ApiRequest;

class CreateBlogRequest extends ApiRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'blog'                   => 'required|array',
            'blog.title'             => 'required',
            'blog.content'           => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'blog'                         => __('blog'),
            'blog.title'                   => __('title'),
            'blog.content'                 => __('content'),
        ];
    }

}
