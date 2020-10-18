<?php

require_once __DIR__.'/../bootstrap/app.php';

require_once __DIR__.'/../app/Controllers/Controller.php';

$controller = new Controller();

echo $controller->respondSuccess('this is test message', [
    'some' => 'test',
    'random' => 'data',
], 201);
