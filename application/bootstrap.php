<?php

/**
 * Application bootstrapper
 *
 * The bootstrap file should initialize the autoloader & Nerd Kernel, set
 * requirements and return the Kernel to the calling file.
 *
 */

namespace Nerd;

error_reporting(E_ALL);
ini_set('date.timezone', 'America/New_York');

$loader    = require __DIR__.'/../vendor/autoload.php';
$container = new Core\Container\Container();
$container->set('loader', $loader);

$dispatcher = new Core\Event\Dispatcher();

$kernel = new Core\Kernel\Kernel($dispatcher, $container);
$kernel->setRoot(dirname(__DIR__));

$exceptionNotifier = new Core\Event\Event('notifier');
$container->set('exceptionNotifier', $exceptionNotifier);

// All errors treated as exceptions
set_error_handler(function ($no, $str, $file, $line) {
    throw new \ErrorException($str, $no, 0, $file, $line);
});

// Register exception handler
set_exception_handler(function($e) use ($container) {
    $notifier = $container->get('exceptionNotifier');
    $notifier->exception = $e;
    $notifier->container = $container;

    $notifier->notify();
});

return $kernel;