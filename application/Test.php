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

    protected $request;
    protected $response;
    protected $kernel;

    public function __construct(Kernel $kernel, $request, $response = null)
    {
        $this->kernel  = $kernel;
        $this->request = $request;

        if ($response === null) {
            $response = new Response();
        }

        $this->response = $response;
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

class ApplicationStartupListener extends ApplicationBaseListener
{
    public function __invoke(EventInterface $event)
    {
        $kernel     = $this->application->getKernel();
        $dispatcher = $kernel->getDispatcher();
        $container  = $kernel->getContainer();
        $request    = $this->application->getRequest();

        $sessionStore = new NativeSessionStorage([
            'save_path' => '4;'.$kernel->getRoot().'/application/storage/sessions/',
            'name' => 'NERDSESS',
        ]);

        $request->setSession(new Session($sessionStore));
        $request->getSession()->start();

        $container->set('logger', $this->_logger());
        $container->set('viewManager', $this->_viewManager());
        $container->set('entityManager', $this->_entityManager());
        $container->set('currentUser', $this->_currentUser());
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

        $entityManager = EntityManager::create([
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'new_nerd',
        ], $config);

        return $entityManager;
    }

    private function _currentUser()
    {
        $entityManager = $this->application->getKernel()->getContainer()->get('entityManager');
        $session = $this->application->getRequest()->getSession();

        return new CurrentUser($entityManager, $session);
    }
}

class ApplicationRequestListener extends ApplicationBaseListener
{
    public function __invoke(EventInterface $event)
    {
        $request     = $event->getArgument('request');
        $currentUser = $this->application->getCurrentUser();

        // Do a login check before we initialize anything!
        $authenticated = $currentUser->check();
    }
}

class ApplicationResponseListener extends ApplicationBaseListener
{
    public function __invoke(EventInterface $event)
    {
        $viewManager = $this->application->getViewManager();

        $view = $viewManager->get('myview.php', ['data1' => 'Hello World!']);
        $response = $event->getArgument('response');
        $response->setContent($view->render());
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
