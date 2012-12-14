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
    ->register('exception', new \CMS\Event\ExceptionLogListener)
    ->register('exception', new \CMS\Event\ExceptionDisplayListener)
    ->register('router',    new \CMS\Event\RouteDatabaseListener)
    ->register('router',    new \CMS\Event\RoutePathListener)
    ->register('router',    new \CMS\Event\RouteCatchListener)
    ->register('startup',   new \CMS\Event\StartupLoggerListener)
    ->register('startup',   new \CMS\Event\StartupViewManagerListener)
    ->register('startup',   new \CMS\Event\StartupDatabaseListener)
    ->register('startup',   new \CMS\Event\StartupSessionListener)
    ->register('startup',   new \CMS\Event\StartupListener)
    ->register('request',   new \CMS\Event\RequestListener)
    ->register('response',  new \CMS\Event\ResponseDatabaseListener)
    ->register('response',  new \CMS\Event\ResponsePathListener)
    ->register('response',  new \CMS\Event\ResponseCatchListener)
    ->register('shutdown',  new \CMS\Event\ShutdownListener);

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
