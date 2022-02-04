<?php

$router->group(['prefix' => '/admin'], function () use ($router){
    $router->get('/blogs', 'BlogController@getAll');
    $router->get('/blogs/create','BlogController@getCreate');
    $router->post('/blogs/create','BlogController@create')->name('blog.create');
    $router->get('/blogs/edit/{id}','BlogController@getEdit');
    $router->post('/blogs/edit/{id}','BlogController@edit')->name('blog.edit');
    $router->get('/blogs/delete/{id}', 'BlogController@delete');
});
