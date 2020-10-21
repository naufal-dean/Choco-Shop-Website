<?php

# User Api
Router::get('/users/', 'UserController@show_users');
Router::post('/users/login/', 'UserController@login');
Router::post('/users/register/', 'UserController@register');
Router::get('/users/([1-9]+)/', 'UserController@id_lookup');
Router::get('/users/username_lookup/', 'UserController@username_lookup');
Router::get('/users/email_lookup/', 'UserController@email_lookup');
Router::get('/users/auth_check/', 'UserController@auth_check');

# Chocolate Api
Router::get('/chocolates/', 'ChocolateController@show_top_selling_chocolates');
Router::get('/chocolates/([1-9]+)/', 'ChocolateController@id_lookup');
Router::get('/chocolates/find/', 'ChocolateController@find_chocolates');
Router::put('/chocolates/buy/([1-9]+)', 'ChocolateController@buy_chocolate');

# Testing purposes
Router::get('/uri/', 'Controller@test');
Router::post('/uri/', 'Controller@test2');
Router::get('/uri/([1-9]*)/', 'Controller@test');
