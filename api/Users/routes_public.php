<?php

$router->post('/users', 'UserController@create');
$router->get('/users', 'UserController@getAll');
