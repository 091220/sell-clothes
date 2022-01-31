<?php 

$router->get('/users','UserController@getAll');
$router->post('/users','UserController@createUser');