<?php

$router->group(['prefix' => '/admin'], function () use ($router){
    $router->get('/dashboard', 'UserController@getDashBoard');
    $router->get('/users', 'UserController@getAll');
    $router->get('/users/create','UserController@getCreate');
    $router->post('/users/create','UserController@create')->name('user.create');
    $router->get('/users/edit/{id}','UserController@getEdit');
    $router->post('/users/edit/{id}','UserController@edit')->name('user.edit');
    $router->get('/users/delete/{id}', 'UserController@delete');
    $router->get('/users/lock/{id}', 'UserController@lock');
});
