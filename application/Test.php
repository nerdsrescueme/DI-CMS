<?php

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface;

use Nerd\Core\Kernel\Kernel
  , Nerd\Core\Kernel\KernelInterface
  , Nerd\Core\Bundle\Bundle
  , Nerd\Core\Kernel\Aware as KernelAware
  , Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\Response
  , Symfony\Component\HttpFoundation\Session\Session
  , Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage
  , Monolog\Logger
  , Monolog\Handler\StreamHandler
  , Monolog\Processor\WebProcessor;

class Application
{
    const STARTUP  = 'app.startup';
    const REQUEST  = 'app.request';
    const RESPONSE = 'app.response';
    const SHUTDOWN = 'app.shutdown';

    protected $request;
    protected $response;
    protected $logger;
    protected $kernel;
    protected $viewManager;

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
        return $this->logger;
    }

    public function getView($view, array $data = [])
    {
        return $this->viewManager->get($view, $data);
    }

    public function getViewManager()
    {
        return $this->viewManager;
    }

    public function setViewManager(\Nerd\View\Manager $viewManager)
    {
        $this->viewManager = $viewManager;

        return $this;
    }

    public function setLogger($logger)
    {
        $this->logger = $logger;

        return $this;
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
        $request    = $this->application->getRequest();

        $sessionStore = new NativeSessionStorage([
            'save_path' => '4;'.$kernel->getRoot().'/application/storage/sessions/',
            'name' => 'NERDSESS',
        ]);

        $request->setSession(new Session($sessionStore));
        $request->getSession()->start();

        $this->_initializeLogger();
        $this->_initializeViewManager();
    }

    private function _initializeLogger()
    {
        $loggerStore = new StreamHandler(
            $this->application->getKernel()->getRoot().'/application/storage/logs/log.php'
        );

        $logger = new Logger('App');
        $logger->pushHandler($loggerStore);
        $logger->pushProcessor(new WebProcessor());

        $this->application->setLogger($logger);
    }

    private function _initializeViewManager()
    {
        $this->application->setViewManager(new Nerd\View\Manager(
            new Nerd\View\Locator\FileLocator(
                $this->application->getDirectory().DIRECTORY_SEPARATOR.'views'
            )
        ));
    }
}

class ApplicationRequestListener extends ApplicationBaseListener
{
    public function __invoke(EventInterface $event)
    {
        $request = $event->getArgument('request');
    }
}

class ApplicationResponseListener extends ApplicationBaseListener
{
    public function __invoke(EventInterface $event)
    {
        $view = $this->application->getView('myview.php', ['data1' => 'Hello World!']);
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
