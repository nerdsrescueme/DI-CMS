<?php

/**
 * Application bootstrapper
 *
 * The bootstrap file should initialize the autoloader & Nerd Kernel, set
 * requirements and return the Kernel to the calling file.
 *
 */

namespace Nerd;

$loader    = require __DIR__.'/../vendor/autoload.php';
$container = new Core\Container\Container();
$container->set('loader', $loader);

$kernel = new Core\Kernel\Kernel(
    new Core\Event\Dispatcher(),
    $container
);

$kernel->setRoot(dirname(__DIR__));

return $kernel;