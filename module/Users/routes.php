<?php

$router->group(['prefix' => '/admin'], function () use ($router){
    $router->get('/dashboard', 'UserController@getDashBoard');
});
