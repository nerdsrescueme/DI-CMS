<?php

use Symfony\Component\HttpFoundation\Request
  , Nerd\Core\Kernel\Kernel
  , Nerd\Core\Environment\Environment
  , Nerd\Core\Event\Event;

// Register all needed variables
$kernel      = require '../application/bootstrap.php';
$environment = new Environment('development');
$application = require '../application/Test.php';
$request     = Request::createFromGlobals();
$application = new Application($kernel, $request);
$response    = $application->getResponse();
$dispatcher  = $kernel->getDispatcher();

// Pre-application configuration and environment loading
$kernel->setEnvironment($environment);
$kernel->registerBundle('CMS');

// Register Kernel/Application Events
$dispatcher->register('startup', new \CMS\Event\KernelStartupListener($kernel));
$dispatcher->register('request', new \CMS\Event\KernelRequestListener($kernel));
$dispatcher->register('response', new \CMS\Event\KernelResponseListener($kernel));
$dispatcher->register('shutdown', new \CMS\Event\KernelShutdownListener($kernel));
$dispatcher->register('startup', new ApplicationStartupListener($application));
$dispatcher->register('request', new ApplicationRequestListener($application));
$dispatcher->register('response', new ApplicationResponseListener($application));
$dispatcher->register('shutdown', new ApplicationShutdownListener($application));

// Start Kernel/Application
$dispatcher->dispatch('startup');

// Process incoming request
$dispatcher->dispatch('request', (new Event('*.request', $dispatcher))->setArgument('request', $request));

// Format response
$dispatcher->dispatch('response', (new Event('*.response', $dispatcher))->setArgument('response', $response));

// Send response
$response->prepare($request)->send();

// Shutdown Application/Kernel
$dispatcher->dispatch('shutdown');


