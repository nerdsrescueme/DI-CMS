<?php

use Nerd\Kernel\KernelInterface
  , Nerd\Bundle\Bundle
  , Nerd\Kernel\Aware as KernelAware
  , Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\Response
  , Symfony\Component\HttpFoundation\Session\Session
  , Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage
  , Monolog\Logger
  , Monolog\Handler\StreamHandler
  , Monolog\Processor\WebProcessor;

class Application extends ApplicationAbstract
{
    protected $session;
    protected $logger;

    public function startup()
    {
        $sessionStore = new NativeSessionStorage([
            'save_path' => '4;'.$this->getKernel()->getRoot().'/application/storage/sessions/',
            'name' => 'NERDSESS',
        ]);

        $this->request->setSession(new Session($sessionStore));
        $this->request->getSession()->start();

        $loggerStore = new StreamHandler(
            $this->getKernel()->getRoot().'/application/storage/logs/log.php'
        );

        $this->logger = new Logger('App');
        $this->logger->pushHandler($loggerStore);
        $this->logger->pushProcessor(new WebProcessor());

        $this->logger->addInfo('Application initialized by client');
    }

    public function handle()
    {
        $response = new Response('This is my content');
        
        return $response;
    }

    public function shutdown()
    {
        $this->request->getSession()->save();
    }
}