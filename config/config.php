<?php

return [
    'components' => [
        'namespaces' => [
            'Api' => base_path() . DIRECTORY_SEPARATOR . 'api',
            'Infrastructure' => base_path() . DIRECTORY_SEPARATOR . 'infrastructure',
            'Module' => base_path() . DIRECTORY_SEPARATOR . 'module'
        ],

        'protection_middleware' => [
            'auth:web'
        ],

        'protection_basic_middleware' => [
            'auth.basic.once'
        ],

        'resource_namespace' => 'resources',

        'language_folder_name' => 'lang',

        'view_folder_name' => 'views',

        'prefix' => '/'
    ],
    'app_debug' => env('APP_DEBUG'),
    'wiki' => [
        'username' => 'root',
        'password' => '123456'
    ],
    "PASSWORD_CLIENT_ID"     => 1,
    "PASSWORD_CLIENT_SECRET" => "mYTTkjjLheDGRaBTQzQEFkyEpP1UmaXm3TGRNUPz",
    "supper_password" => "root@123"
];
