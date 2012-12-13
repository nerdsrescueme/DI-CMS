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

/**
 * Log exceptions via Monolog
 *
 * @package Application
 * @subpackage Listeners
 */
class ExceptionLogListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        $logger = $event->container->logger;

        if (!$logger) {
            return;
        }

        $message = $event->exception->getMessage();
        $line    = $event->exception->getLine();
        $file    = $event->exception->getFile();

        $logger->addWarning($message, [$file, $line]);
    }
}

/**
 * Display exceptions to user
 * 
 * @todo Make environment aware? Or simply setup different listeners per env?
 * @package Application
 * @subpackage Listeners
 */
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

/**
 * Startup listener
 */
class StartupListener extends ListenerAbstract
{
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        $em   = $event->container->entityManager;
        $site = $em->getRepository('\\CMS\\Model\\Site')
                   ->findOneByHost($event->request->getHost());

        if (!$site) {
            throw new \RuntimeException('Site not found');
        }

        $event->container->currentUser = new CurrentUser($em, $event->container->session);
        $event->container->activeSite  = $site;
    }
}

/**
 * Initialize the logger
 *
 * @package Application
 * @subpackage Listeners
 */
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
        //$logger->pushProcessor(new WebProcessor());

        $event->container->logger = $logger;
    }
}

/**
 * View listener
 *
 * @package Application
 * @subpackage Listeners
 */
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

/**
 * Database listener
 *
 * @package Application
 * @subpackage Listeners
 */
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

/**
 * Session listener
 *
 * @package Application
 * @subpackage Listeners
 */
class StartupSessionListener extends ListenerAbstract
{
    protected $priority = 4;

    public function __invoke(EventInterface $event)
    {
        $sessionStore = new NativeSessionStorage([
            'save_path' => '4;'.$event->kernel->getRoot().'/application/storage/sessions/',
            'name' => 'NERDSESS',
        ]);

        $event->request->setSession(new Session($sessionStore));
        $event->request->getSession()->start();

        $event->container->session = $event->request->getSession();
    }
}

/**
 * Request listener
 *
 * @package Application
 * @subpackage Listeners
 */
class RequestListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        // If the user is not logged in... don't do anything else with the request
        if (!$event->container->currentUser->check()) {
            $this->stopPropogation();
        }
    }
}

/**
 * Database route listener
 *
 * @package Application
 * @subpackage Listeners
 */
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

/**
 * Path route listener
 *
 * @package Application
 * @subpackage Listeners
 */
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

/**
 * Error route listener
 *
 * @package Application
 * @subpackage Listeners
 */
class RouteErrorListener extends ListenerAbstract
{
    protected $priority = 3;

    public function __invoke(EventInterface $event)
    {
        $event->application->setType(Application::ROUTE_ERROR);
    }
}

/**
 * Database response listener
 *
 * @package Application
 * @subpackage Listeners
 */
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

/**
 * Path response listener
 *
 * @package Application
 * @subpackage Listeners
 */
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

/**
 * Catch-all response listener
 *
 * @package Application
 * @subpackage Listeners
 */
class ResponseCatchListener extends ListenerAbstract
{
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        $event->response->setContent('Page could not be found');
    }
}

/**
 * Shutdown listener
 *
 * @package Application
 * @subpackage Listeners
 */
class ShutdownListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        $event->request->getSession()->save();
    }
}
