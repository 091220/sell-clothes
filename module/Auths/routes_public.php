<?php

$router->group(['prefix' => '/admin'], function () use ($router){
    $router->get('/login', 'AuthController@getLogin')->middleware('check_login');
    $router->post('/login', 'AuthController@login')->name('login');
});
