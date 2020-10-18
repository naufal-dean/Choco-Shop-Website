<?php

Router::get('/uri/', 'Controller@test');
Router::post('/uri/', 'Controller@test2');
Router::get('/uri/([1-9]*)/', 'Controller@test');
