<?php

use Aura\Router\Map as Router;

return function(Router $router) {

    $router->add(
        'login', '/{:area}/login',
        [
            'values' => [
                'controller' => 'user',
                'action' => 'login',
            ]
        ]
    );

    $router->add(
        'login', '/{:area}/logout',
        [
            'values' => [
                'controller' => 'user',
                'action' => 'logout',
            ]
        ]
    );

    $router->add(
        'editor', '/{:area:(admin|super)}/editor',
        [
            'values' => [
                'controller' => 'editor',
                'action' => 'index',
            ]
        ]
    );

    $router->add(
        'editor', '/{:area:(admin|super)}/editor/{:layout}',
        [
            'values' => [
                'controller' => 'editor',
                'action' => 'edit',
            ]
        ]
    );

    $router->add(null, '/{:area:(user|admin|super)}/{:controller}/{:id:(\d+)}/{:action}');
    $router->add(null, '/{:area:(user|admin|super)}/{:controller}/{:action}(/)?{:id:(\d+)?}');

};
