<?php

# User Api
Router::get('/api/users/', 'UserController@show_users');
Router::post('/api/users/login/', 'UserController@login');
Router::post('/api/users/logout/', 'UserController@logout');
Router::post('/api/users/register/', 'UserController@register');
Router::get('/api/users/logout', 'UserController@logout');
Router::get('/api/users/([1-9]+)/', 'UserController@id_lookup');
Router::get('/api/users/username_lookup/', 'UserController@username_lookup');
Router::get('/api/users/email_lookup/', 'UserController@email_lookup');

# Chocolate Api
Router::get('/api/chocolates/', 'ChocolateController@show_top_selling_chocolates');
Router::get('/api/chocolates/([1-9]+)/', 'ChocolateController@id_lookup');
Router::get('/api/chocolates/find/', 'ChocolateController@find_chocolates');
Router::post('/api/chocolates/add/', 'ChocolateController@add_chocolate');
Router::put('/api/chocolates/([1-9]+)/add', 'ChocolateController@add_stock_chocolate');
Router::put('/api/chocolates/([1-9]+)/buy', 'ChocolateController@buy_chocolate');

# Pages
Router::get('/login/', 'PageController@login_page');
Router::get('/register/', 'PageController@register_page');
Router::get('/', 'PageController@dashboard_page');
Router::get('/add_chocolate/', 'PageController@add_chocolate_page');
Router::get('/transaction_history/', 'PageController@transaction_history_page');
Router::get('/search/', 'PageController@search_page');
Router::get('/detail_chocolate/([1-9]*)/', 'PageController@detail_chocolate_page');
Router::get('/detail_chocolate/([1-9]*)/add/', 'PageController@add_stock_chocolate_page');
Router::get('/detail_chocolate/([1-9]*)/buy/', 'PageController@buy_chocolate_page');

# Transactions Api
Router::get('/transactions/', 'TransactionController@get_user_transactions');

# Testing purposes
Router::get('/uri/', 'Controller@test');
Router::post('/uri/', 'Controller@test2');
Router::get('/uri/([1-9]*)/', 'Controller@test');
