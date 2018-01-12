<?php

$classMap = [
    'Router' => 'core/Router',
    'Response' => 'core/Response',
    'Controller' => 'core/Controller',
    'Auth' => 'core/Auth',
    'Error' => 'core/Error',
    'User' => 'models/User',
    'DefaultController' => 'controllers/DefaultController',
    'UsersController' => 'controllers/UsersController',
];

spl_autoload_register(function ($class) use ($classMap) {
    require_once __DIR__ . '/' . $classMap[$class] . '.php';
},true, true);