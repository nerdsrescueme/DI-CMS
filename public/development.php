<?php

define('START', microtime(true));

use Nerd\Core\Kernel\Kernel
  , Nerd\Core\Environment\Environment
  , Nerd\Core\Event\Event
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
    ->register('exception', new ExceptionLogListener)
    ->register('exception', new ExceptionDisplayListener)
    ->register('router',    new RouteDbListener)
    ->register('router',    new RoutePathListener)
    ->register('router',    new RouteErrorListener)
    ->register('startup',   new StartupLoggerListener)
    ->register('startup',   new StartupViewManagerListener)
    ->register('startup',   new StartupDatabaseListener)
    ->register('startup',   new StartupListener)
    ->register('request',   new RequestListener)
    ->register('response',  new ResponseDbListener)
    ->register('response',  new ResponsePathListener)
    ->register('response',  new ResponseCatchListener)
    ->register('shutdown',  new ShutdownListener);

$baseEvent = new Event('base', $dispatcher);
$baseEvent->setArgument('kernel',      $kernel);
$baseEvent->setArgument('application', $application);
$baseEvent->setArgument('request',     $request);
$baseEvent->setArgument('response',    $response);
$baseEvent->setArgument('container',   $kernel->getContainer());
$baseEvent->setArgument('uri',         $request->getPathInfo());

// Start Kernel/Application
$startupEvent = clone $baseEvent;
$startupEvent->setName('startup')->dispatch();

$baseEvent->setArgument('em', $kernel->getContainer()->entityManager);

// Process incoming request
$requestEvent = clone $baseEvent;
$requestEvent->setName('request')->dispatch();

$routerEvent = clone $baseEvent;
$routerEvent->setName('router')->dispatch();

// Format response
$responseEvent = clone $baseEvent;
$responseEvent->setName('response')->dispatch();

// Send response
$response->prepare($request)->send();

// Shutdown Application/Kernel
$shutdownEvent = clone $baseEvent;
$shutdownEvent->setName('shutdown')->dispatch();
