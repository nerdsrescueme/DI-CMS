<?php

define('START', microtime(true));

use Nerd\Core\Kernel\Kernel
  , Nerd\Core\Environment\Environment
  , Nerd\Core\Event\Event
  , CMS\Event\KernelStartupListener
  , CMS\Event\KernelRequestListener
  , CMS\Event\KernelResponseListener
  , CMS\Event\KernelShutdownListener
  , Symfony\Component\HttpFoundation\Request;

// Register all needed variables
$kernel      = require '../application/bootstrap.php';
               require '../application/Test.php';
$environment = new Environment('development');
$request     = Request::createFromGlobals();
$application = new Application($kernel, $request);
$response    = $application->getResponse();
$dispatcher  = $kernel->getDispatcher();

// Pre-application configuration and environment loading
$kernel->setEnvironment($environment);
$kernel->registerBundle('CMS');

// Register Kernel/Application Events
$dispatcher
    ->register('startup',  new KernelStartupListener($kernel))
    ->register('request',  new KernelRequestListener($kernel))
    ->register('response', new KernelResponseListener($kernel))
    ->register('shutdown', new KernelShutdownListener($kernel))
    ->register('startup',  new ApplicationStartupListener($application))
    ->register('request',  new ApplicationRequestListener($application))
    ->register('response', new ApplicationResponseListener($application))
    ->register('shutdown', new ApplicationShutdownListener($application));

// Start Kernel/Application
$startupEvent = new Event('*.startup', $dispatcher);
$dispatcher->dispatch('startup', $startupEvent);

// Process incoming request
$requestEvent = new Event('*.request', $dispatcher);
$requestEvent->setArgument('request', $request);
$dispatcher->dispatch('request', $requestEvent);

// Format response
$responseEvent = new Event('*.response', $dispatcher);
$responseEvent->setArgument('response', $response);
$dispatcher->dispatch('response', $responseEvent);

// Send response
$response->prepare($request)->send();

// Shutdown Application/Kernel
$shutdownEvent = new Event('*.shutdown', $dispatcher);
$dispatcher->dispatch('shutdown', $shutdownEvent);

die((microtime(true) - START).' seconds to render');
