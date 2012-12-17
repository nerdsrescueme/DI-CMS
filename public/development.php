<?php

use Nerd\Core\Kernel\Kernel
  , Nerd\Core\Environment\Environment
  , Nerd\Core\Event\Event
  , Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\RedirectResponse
  , CMS\Application;


// Bootstrap the kernel and CMS bundle
$kernel = require '../application/bootstrap.php';
$kernel->registerBundle('CMS');


// Register exception handlers for this application
$exception = $kernel->getContainer()->exceptionNotifier;
$exception
    ->attach(new \CMS\Event\ExceptionLogObserver)
    ->attach(new \CMS\Event\ExceptionDisplayObserver);


// Register needed variables and aliases
$environment = new Environment('development');
$container   = $kernel->getContainer();
$request     = $container->set('request', Request::createFromGlobals());
$application = $container->set('application', new Application($kernel, $request));
$response    = $container->set('response', $application->getResponse());
$event       = new Event('base', $kernel->getDispatcher());
$notifier    = new Event('response');


// Pre-application configuration and environment loading
$kernel->setEnvironment($environment);
$notifier->handled = false;


// Register Kernel/Application Events
$dispatcher
    ->register('router',   new \CMS\Event\RouteDatabaseListener)
    ->register('router',   new \CMS\Event\RoutePathListener)
    ->register('router',   new \CMS\Event\RouteCatchListener)
    ->register('setup',    new \CMS\Event\SetupLoggerListener)
    ->register('setup',    new \CMS\Event\SetupDatabaseListener)
    ->register('setup',    new \CMS\Event\SetupSessionListener)
    ->register('setup',    new \CMS\Event\SetupListener)
    ->register('setup',    new \CMS\Event\SetupTemplateListener)
    ->register('teardown', new \CMS\Event\TeardownListener);


// Register all response observers
$notifier
  ->attach(new \CMS\Event\ResponseDatabaseObserver)
  ->attach(new \CMS\Event\ResponsePathObserver)
  ->attach(new \CMS\Event\ResponseForbiddenObserver)
  ->attach(new \CMS\Event\ResponseRedirectObserver)
  ->attach(new \CMS\Event\ResponseCatchObserver);


// Setup events for injection
$event->setArgument('kernel', $kernel);
$event->setArgument('container',   $container);
$notifier->setArgument('kernel', $kernel);
$notifier->setArgument('container', $container);


// Run events and notify event observers
$event->setName('startup')->dispatch();
$event->setName('setup')->dispatch();
$event->setName('router')->dispatch();

$notifier->notify();


// Send the response gathered from above events
$container->response->prepare($request)->send();


// Shutdown
$event->setName('teardown')->dispatch();
