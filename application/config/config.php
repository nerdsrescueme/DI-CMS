<?php

use Monolog\Handler\StreamHandler
  , Monolog\Processor\WebProcessor;

return [

    'Logger' => [
        'App' => [
            'handler'   => '\\Monolog\\Handler\\StreamHandler',
            'formatter' => null,
            'processor' => [ new WebProcessor() ],
        ],
    ],

];