<?php

require __DIR__.'/../vendor/autoload.php';

use Nerd\Kernel\Kernel
  , Nerd\Event\Listener
  , Nerd\Event\Dispatcher
  , Nerd\Bundle\Manager as BundleManager
  , Nerd\Container\Container
  , Nerd\Bundle\Bundle;

$bundle  = new Bundle();
$manager = new BundleManager();
    $manager->register($bundle);

$dispatcher = new Dispatcher();
    $dispatcher->register(Kernel::START, new Listener());
    $dispatcher->dispatch(Kernel::START);

$container = new Container();

$kernel = new Kernel($dispatcher, $manager, $container);
$kernel->setRoot(dirname(__DIR__));

return $kernel;