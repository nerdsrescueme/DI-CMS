<?php

use Nerd\Kernel\KernelInterface
  , Nerd\Kernel\Aware as KernelAware
  , Nerd\Bundle\Bundle
  , Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\Response;

abstract class ApplicationAbstract
{
    use KernelAware;

    protected $request;
    protected $diContainer;
    protected $eventDispatcher;

    public function __construct(KernelInterface $kernel, Request $request)
    {
        $this->setKernel($kernel);
        $this->setRequest($request);
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }

    abstract public function handle();

    abstract public function startup();

    abstract public function shutdown();
}