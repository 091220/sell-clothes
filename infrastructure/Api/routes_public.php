<?php 

$router->get('/api/v1', 'DefaultApiController@index');
$router->get('/api/v1/wiki','DefaultApiController@wiki');
