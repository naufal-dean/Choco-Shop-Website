<?php

# User Api
Router::get('/api/users/', 'UserController@show_users');
Router::post('/api/users/login/', 'UserController@login');
Router::post('/api/users/register/', 'UserController@register');
Router::get('/api/users/([1-9]+)/', 'UserController@id_lookup');
Router::get('/api/users/username_lookup/', 'UserController@username_lookup');
Router::get('/api/users/email_lookup/', 'UserController@email_lookup');
Router::get('/api/users/auth_check/', 'UserController@auth_check');

# Chocolate Api
Router::get('/api/chocolates/', 'ChocolateController@show_top_selling_chocolates');
Router::get('/api/chocolates/([1-9]+)/', 'ChocolateController@id_lookup');
Router::get('/api/chocolates/find/', 'ChocolateController@find_chocolates');
Router::put('/api/chocolates/buy/([1-9]+)', 'ChocolateController@buy_chocolate');
Router::put('/chocolates/add/', 'ChocolateController@add_chocolate');

# Pages
Router::get('/login/', 'PageController@login_page');
Router::get('/register/', 'PageController@register_page');
Router::get('/', 'PageController@dashboard_page');

# Transactions Api
Router::get('/transactions/', 'TransactionController@get_user_transactions');

# Testing purposes
Router::get('/uri/', 'Controller@test');
Router::post('/uri/', 'Controller@test2');
Router::get('/uri/([1-9]*)/', 'Controller@test');
