<?php

/**
 * Application bootstrapper
 *
 * The bootstrap file should initialize the autoloader & Nerd Kernel, set
 * requirements and return the Kernel to the calling file.
 *
 */

namespace Nerd;

require __DIR__.'/../vendor/autoload.php';

$kernel = new Kernel\Kernel(
    new Event\Dispatcher(),
    new Bundle\Manager(),
    new Container\Container()
);

$kernel->setRoot(dirname(__DIR__));

return $kernel;