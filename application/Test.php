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

    protected $request;
    protected $response;
    protected $kernel;
    protected $site;

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

    public function getRequest()
    {
        return $this->request;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getKernel()
    {
        return $this->kernel;
    }

    public function getLogger()
    {
        return $this->kernel->getContainer()->get('logger');
    }

    public function getEntityManager()
    {
        return $this->kernel->getContainer()->get('entityManager');
    }

    public function getViewManager()
    {
        return $this->kernel->getContainer()->get('viewManager');
    }

    public function getCurrentUser()
    {
        return $this->kernel->getContainer()->get('currentUser');
    }

	public function getActiveSite()
	{
		return $this->kernel->getContainer()->get('activeSite');
	}
}

abstract class ApplicationBaseListener extends ListenerAbstract
{
    protected $priority = 10;
    protected $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }
}


class ApplicationExceptionMailListener extends ListenerAbstract
{
	protected $priority = 2;

	public function __invoke(EventInterface $event)
	{
		echo 'MAILING EXCEPTION';
	}
}

class ApplicationExceptionDisplayListener extends ListenerAbstract
{
	protected $priority = 10;

	public function __invoke(EventInterface $event)
	{
		die($event->exception->getMessage());
	}
}

use Nerd\Core\Event\Event;

class ApplicationStartupListener extends ApplicationBaseListener
{
    public function __invoke(EventInterface $event)
    {
    	set_exception_handler(function($e) use ($event) {
			$d = $event->getDispatcher();
			$d->register('exception', new ApplicationExceptionListener);

			$ev = new Event('exception', $d);
			$ev->exception = $e;
			$d->dispatch('exception', $ev);
		});

        $kernel     = $this->application->getKernel();
        $container  = $kernel->getContainer();
        $request    = $this->application->getRequest();

		$em   = $this->_entityManager();
		$site = $em->getRepository('\\CMS\\Model\\Site')
			       ->findOneByHost($request->getHost());

		if ($site === null) {
			throw new \RuntimeException('Site not found');
		}

        $sessionStore = new NativeSessionStorage([
            'save_path' => '4;'.$kernel->getRoot().'/application/storage/sessions/',
            'name' => 'NERDSESS',
        ]);

        $request->setSession(new Session($sessionStore));
        $request->getSession()->start();

		$container->entityManager = $em;
		$container->session       = $request->getSession();
        $container->logger        = $this->_logger();
        $container->viewManager   = $this->_viewManager();
        $container->currentUser   = new CurrentUser($em, $container->session);
        $container->activeSite    = $site;
    }

    private function _logger()
    {
        $loggerStore = new StreamHandler(
            $this->application->getKernel()->getRoot().'/application/storage/logs/log.php'
        );

        $logger = new Logger('App');
        $logger->pushHandler($loggerStore);
        $logger->pushProcessor(new WebProcessor());

        return $logger;
    }

    private function _viewManager()
    {
        return new Nerd\View\Manager(
            new Nerd\View\Locator\FileLocator(
                $this->application->getDirectory().DIRECTORY_SEPARATOR.'views'
            )
        );
    }

    private function _entityManager()
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

        return $em;
    }

    private function _currentUser()
    {
        $em = $this->application->getKernel()->getContainer()->get('entityManager');
        $session = $this->application->getRequest()->getSession();

        return new CurrentUser($em, $session);
    }
}

class ApplicationRequestListener extends ApplicationBaseListener
{
    public function __invoke(EventInterface $event)
    {
        $currentUser = $this->application->getCurrentUser();

        // Do a login check before we initialize anything!
        $authenticated = $currentUser->check();
    }
}

class ApplicationRouteDbListener extends ApplicationBaseListener
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
			$this->application->setType(Application::ROUTE_DB);
		}
	}
}

use Aura\Router\Map
  , Aura\Router\DefinitionFactory
  , Aura\Router\RouteFactory;

class ApplicationRoutePathListener extends ApplicationBaseListener
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
			$this->application->setType(Application::ROUTE_PATH);
		}
	}
}

class ApplicationRouteErrorListener extends ApplicationBaseListener
{
	protected $priority = 3;

	public function __invoke(EventInterface $event)
	{
		$this->application->setType(Application::ROUTE_ERROR);
	}
}

class ApplicationResponseListener extends ApplicationBaseListener
{
    public function __invoke(EventInterface $event)
    {
    	$response = $event->response;

    	switch($this->application->getType()) {
    		case Application::ROUTE_DB :
    			$response->setContent('Page loaded and rendered from database');
    			break;
    		case Application::ROUTE_PATH :
        		$response->setContent('Page loaded and rendered from file');
    			break;
    		case Application::ROUTE_ERROR :
    		default:
    			$response->setContent('Page could not be found');
    	}
    }
}

class ApplicationShutdownListener extends ApplicationBaseListener
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        $this->application->getRequest()->getSession()->save();
    }
}
