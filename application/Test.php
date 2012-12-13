<?php

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , Nerd\Core\Kernel\Kernel
  , Nerd\Core\Kernel\KernelInterface
  , Nerd\Core\Bundle\Bundle
  , Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\Response
  , Symfony\Component\HttpFoundation\Session\Session
  , Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage
  , Monolog\Logger
  , Monolog\Handler\StreamHandler
  , Monolog\Processor\WebProcessor
  , CMS\CurrentUser
  , Doctrine\ORM\Tools\Setup
  , Doctrine\ORM\EntityManager
  , Doctrine\ORM\Configuration;

class Application
{
    const STARTUP  = 'app.startup';
    const REQUEST  = 'app.request';
    const RESPONSE = 'app.response';
    const SHUTDOWN = 'app.shutdown';

    const PAGE_HOME = '@@HOME';

    const ROUTE_DB = 1;
    const ROUTE_PATH = 2;
    const ROUTE_ERROR = 3;

    protected $type;

    public function __construct(Kernel $kernel, $request, $response = null)
    {
        $this->kernel  = $kernel;
        $this->request = $request;

        if ($response === null) {
            $response = new Response();
        }

        $this->response = $response;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getDirectory()
    {
        return __DIR__;
    }

    public function getResponse()
    {
        return $this->response;
    }
}


class ExceptionLogListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        // Log exception...
    }
}

class ExceptionDisplayListener extends ListenerAbstract
{
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        $response = new Response();

        $message = '<b>'.$event->exception->getMessage().'</b> in '.
                   $event->exception->getFile().' on line '.
                   $event->exception->getLine();

        $response->setContent($message);
        $response->setStatusCode(500);
        $response->send();

        exit(0);
    }
}

use Nerd\Core\Event\Event;

class StartupListener extends ListenerAbstract
{
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        $em   = $event->container->entityManager;
        $site = $em->getRepository('\\CMS\\Model\\Site')
                   ->findOneByHost($event->request->getHost());

        if ($site === null) {
            throw new \RuntimeException('Site not found');
        }

        $sessionStore = new NativeSessionStorage([
            'save_path' => '4;'.$event->kernel->getRoot().'/application/storage/sessions/',
            'name' => 'NERDSESS',
        ]);

        $event->request->setSession(new Session($sessionStore));
        $event->request->getSession()->start();

        $event->container->session     = $event->request->getSession();
        $event->container->currentUser = new CurrentUser($em, $event->container->session);
        $event->container->activeSite  = $site;
    }
}

class StartupLoggerListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        $loggerStore = new StreamHandler(
            $event->kernel->getRoot().'/application/storage/logs/log.php'
        );

        $logger = new Logger('App');
        $logger->pushHandler($loggerStore);
        $logger->pushProcessor(new WebProcessor());

        $event->container->logger = $logger;
    }
}

class StartupViewManagerListener extends ListenerAbstract
{
    protected $priority = 2;

    public function __invoke(EventInterface $event)
    {
        $vm = new Nerd\View\Manager(
            new Nerd\View\Locator\FileLocator(
                $event->application->getDirectory().DIRECTORY_SEPARATOR.'views'
            )
        );

        $event->container->viewManager = $vm;
    }
}

class StartupDatabaseListener extends ListenerAbstract
{
    protected $priority = 3;

    public function __invoke(EventInterface $event)
    {
        $cache  = new \Doctrine\Common\Cache\ApcCache;
        $config = new Configuration;
        $driver = $config->newDefaultAnnotationDriver(__DIR__.'/../bundles/cms/src/CMS/Model');
        $config->setMetadataDriverImpl($driver);
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);
        $config->setProxyDir(__DIR__.'/storage/proxies');
        $config->setProxyNamespace('Proxies');
        $config->setAutoGenerateProxyClasses(true);

        $em = EntityManager::create([
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'new_nerd',
        ], $config);

        $event->container->entityManager = $em;
    }
}

class RequestListener extends ListenerAbstract
{
    public function __invoke(EventInterface $event)
    {
        $currentUser = $event->container->currentUser;

        // Do a login check before we initialize anything!
        $authenticated = $currentUser->check();
    }
}

class RouteDbListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        $uri = $event->uri;

        switch($uri) {
            case '/' :
                $uri = Application::PAGE_HOME;
                break;
        }

        $page = $event->em->getRepository('\\CMS\\Model\\Page')->findOneByUri($uri);

        if ($page) {
            $event->stopPropogation();
            $event->container->activePage = $page;
            $event->application->setType(Application::ROUTE_DB);
        }
    }
}

use Aura\Router\Map
  , Aura\Router\DefinitionFactory
  , Aura\Router\RouteFactory;

class RoutePathListener extends ListenerAbstract
{
    protected $priority = 2;

    public function __invoke(EventInterface $event)
    {
        $router = new Map(new DefinitionFactory, new RouteFactory);
        $router->add(null, '/{:controller}/{:action}/{:id:(\d+)}'); // Get map file?

        $route = $router->match($event->uri, $_SERVER);

        if ($route) {
            $event->stopPropogation();
            $event->container->router = $router;
            $event->container->route  = $route;
            $event->application->setType(Application::ROUTE_PATH);
        }
    }
}

class RouteErrorListener extends ListenerAbstract
{
    protected $priority = 3;

    public function __invoke(EventInterface $event)
    {
        $event->application->setType(Application::ROUTE_ERROR);
    }
}

class ResponseDbListener extends ListenerAbstract
{
    protected $priority = 1;

    public function determine(EventInterface $event)
    {
        return $event->application->getType() === Application::ROUTE_DB;
    }

    public function __invoke(EventInterface $event)
    {
        $event->response->setContent('Page loaded and rendered from database');
        $event->stopPropogation();
    }
}

class ResponsePathListener extends ListenerAbstract
{
    protected $priority = 2;

    public function determine(EventInterface $event)
    {
        return $event->application->getType() === Application::ROUTE_PATH;
    }

    public function __invoke(EventInterface $event)
    {
        $event->response->setContent('Page loaded and rendered from file');
        $event->stopPropogation();
    }
}

class ResponseCatchListener extends ListenerAbstract
{
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        $event->response->setContent('Page could not be found');
    }
}

class ShutdownListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        $event->request->getSession()->save();
    }
}
