<?php

require_once __DIR__ . '/autoload.php';


set_exception_handler('Error::jsonExceptionHandler');
set_error_handler('Error::jsonErrorHandler');

$routes = [
    [
        'route' => ['/' => 'DefaultController/index'],
        'method' => 'GET',
    ],
    [
        'route' => ['/users' => 'UsersController/users'],
        'method' => 'GET',
    ],
    [
        'route' => ['/users/:num' => 'UsersController/userId/$1'],
        'method' => 'GET',
    ],
];

$router = new Router($routes);
$router->run();

exit;
