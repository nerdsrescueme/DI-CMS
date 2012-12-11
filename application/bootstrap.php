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
set_exception_handler(function($e) {
	die(var_dump($e));
});
set_error_handler(function ($no, $str, $file, $line) {
    throw new \ErrorException($str,$no,0,$file,$line);
});

$loader    = require __DIR__.'/../vendor/autoload.php';
$container = new Core\Container\Container();
$container->set('loader', $loader);

$dispatcher = new Core\Event\Dispatcher();

$kernel = new Core\Kernel\Kernel($dispatcher, $container);
$kernel->setRoot(dirname(__DIR__));

return $kernel;