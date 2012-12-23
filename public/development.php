<?php

use Nerd\Core\Kernel\Kernel
  , Nerd\Core\Environment\Environment
  , Nerd\Core\Event\Event
  , Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\RedirectResponse
  , CMS\Application;


// Bootstrap the kernel and CMS bundle
$kernel = require '../application/bootstrap.php';
$kernel->getContainer()->loader->add('CMS', __DIR__.'/../application/src/');

$GLOBALS['kernel'] = $kernel;

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
    ->attach('router',   new \CMS\Event\RouteDatabaseListener)
    ->attach('router',   new \CMS\Event\RoutePathListener)
    ->attach('router',   new \CMS\Event\RouteCatchListener)
    ->attach('setup',    new \CMS\Event\SetupLoggerListener)
    ->attach('setup',    new \CMS\Event\SetupDatabaseListener)
    ->attach('setup',    new \CMS\Event\SetupSessionListener)
    ->attach('setup',    new \CMS\Event\SetupListener)
    ->attach('setup',    new \CMS\Event\SetupTemplateListener)
    ->attach('setup',    new \CMS\Event\SetupAssetListener)
    ->attach('teardown', new \CMS\Event\TeardownListener);


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
$event->setName('setup');
$dispatcher->dispatch('setup', $event);
$event->setName('router');
$dispatcher->dispatch('router', $event);

$notifier->notify();


// Send the response gathered from above events
$container->response->prepare($request)->send();


// Shutdown
$event->setName('teardown');
$dispatcher->dispatch('teardown', $event);
