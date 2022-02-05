<?php

$router->group(['prefix' => '/admin'], function () use ($router){
    //attributes
    $router->get('/products/attributes', 'AttributeController@getAll');
    $router->get('/products/attributes/create','AttributeController@getCreate');
    $router->post('/products/attributes/create','AttributeController@create')->name('attribute.create');
    $router->get('/products/attributes/edit/{id}','AttributeController@getEdit');
    $router->post('/products/attributes/edit/{id}','AttributeController@edit')->name('attribute.edit');
    $router->get('/products/attributes/delete/{id}', 'AttributeController@delete');
});
