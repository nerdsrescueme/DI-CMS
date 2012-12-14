<?php

use Nerd\Core\Kernel\Kernel
  , Nerd\Core\Environment\Environment
  , Nerd\Core\Event\Event
  , Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\RedirectResponse
  , CMS\Application;

// Register all needed variables
$kernel = require '../application/bootstrap.php';
$kernel->registerBundle('CMS');

$environment = new Environment('development');
$request     = Request::createFromGlobals();
$application = new Application($kernel, $request);
$response    = $application->getResponse();
$dispatcher  = $kernel->getDispatcher();

// Pre-application configuration and environment loading
$kernel->setEnvironment($environment);

// Register Kernel/Application Events
$dispatcher
    ->register('exception', new \CMS\Event\ExceptionLogListener)
    ->register('exception', new \CMS\Event\ExceptionDisplayListener)
    ->register('router',    new \CMS\Event\RouteDatabaseListener)
    ->register('router',    new \CMS\Event\RoutePathListener)
    ->register('router',    new \CMS\Event\RouteCatchListener)
    ->register('startup',   new \CMS\Event\StartupLoggerListener)
    ->register('startup',   new \CMS\Event\StartupTemplateListener)
    ->register('startup',   new \CMS\Event\StartupDatabaseListener)
    ->register('startup',   new \CMS\Event\StartupSessionListener)
    ->register('startup',   new \CMS\Event\StartupListener)
    ->register('request',   new \CMS\Event\RequestListener)
    ->register('response',  new \CMS\Event\ResponseForbiddenListener)
    ->register('response',  new \CMS\Event\ResponseDatabaseListener)
    ->register('response',  new \CMS\Event\ResponsePathListener)
    ->register('response',  new \CMS\Event\ResponseRedirectListener)
    ->register('response',  new \CMS\Event\ResponseCatchListener)
    ->register('shutdown',  new \CMS\Event\ShutdownListener);

$event = new Event('base', $dispatcher);
$event->setArgument('kernel',      $kernel);
$event->setArgument('application', $application);
$event->setArgument('request',     $request);
$event->setArgument('response',    $response);
$event->setArgument('container',   $kernel->getContainer());
$event->setArgument('uri',         $request->getPathInfo());

// Start Kernel/Application
$event->setName('startup')->dispatch();

$event->setArgument('em', $kernel->getContainer()->entityManager);

$event->setName('request')->dispatch();
$event->setName('router')->dispatch();
$event->setName('response')->dispatch();

$event->response->prepare($request)->send();

$event->setName('shutdown')->dispatch();
