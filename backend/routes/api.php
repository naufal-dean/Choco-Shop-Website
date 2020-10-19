<?php

# User Api
Router::get('/users/', 'UserController@show_users');
Router::post('/users/', 'UserController@login');
Router::put('/users/', 'UserController@register');
Router::get('/users/([1-9]+)/', 'UserController@id_lookup');
Router::get('/users/username_lookup/', 'UserController@username_lookup');
Router::get('/users/email_lookup/', 'UserController@email_lookup');

# Testing purposes
Router::get('/uri/', 'Controller@test');
Router::post('/uri/', 'Controller@test2');
Router::get('/uri/([1-9]*)/', 'Controller@test');
