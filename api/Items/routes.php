<?php

$router->get('/items', 'ItemController@getAll');
$router->get('/items/{id}', 'ItemController@getById');
$router->post('/items', 'ItemController@create');
$router->put('/items/{id}', 'ItemController@update');
$router->delete('/items/{id}', 'ItemController@delete');
