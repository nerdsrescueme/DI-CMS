<?php

require '../application/bootstrap.php';

use Nerd\Kernel\Kernel;
use Nerd\Event\Listener;
use Nerd\Event\Dispatcher;
use Nerd\Bundle\Manager as BundleManager;
use Nerd\Kernel\Events as KernelEvents;
use Nerd\Container\Container;
use Nerd\Bundle\Bundle;

$bundle  = new Bundle();
$manager = new BundleManager();
    $manager->register($bundle);

$dispatcher = new Dispatcher();
    $dispatcher->register(Kernel::START, new Listener());
    $dispatcher->dispatch(Kernel::START);

$container = new Container();

$kernel = new Kernel($dispatcher, $manager, $container);
$kernel->setRoot(realpath(__DIR__.'/../'));

die(var_dump($kernel));