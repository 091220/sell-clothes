<?php

$router->group(['prefix' => '/admin'], function () use ($router){
    //products
    $router->get('/products', 'ProductController@getAll');
    $router->get('/products/create','ProductController@getCreate');
    $router->post('/products/create','ProductController@create')->name('product.create');
    $router->get('/products/edit/{id}','ProductController@getEdit');
    $router->post('/products/edit/{id}','ProductController@edit')->name('product.edit');
    $router->get('/products/delete/{id}', 'ProductController@delete');
    //categories
    $router->get('/products/categories', 'CategoryController@getAll');
    $router->get('/products/categories/create','CategoryController@getCreate');
    $router->post('/products/categories/create','CategoryController@create')->name('category.create');
    $router->get('/products/categories/edit/{id}','CategoryController@getEdit');
    $router->post('/products/categories/edit/{id}','CategoryController@edit')->name('category.edit');
    $router->get('/products/categories/delete/{id}', 'CategoryController@delete');
    //attributes
    $router->get('/products/attributes', 'AttributeController@getAll');
    $router->get('/products/attributes/create','AttributeController@getCreate');
    $router->post('/products/attributes/create','AttributeController@create')->name('attribute.create');
    $router->get('/products/attributes/edit/{id}','AttributeController@getEdit');
    $router->post('/products/attributes/edit/{id}','AttributeController@edit')->name('attribute.edit');
    $router->get('/products/attributes/delete/{id}', 'AttributeController@delete');
});
