<?php

namespace CMS;

use Nerd\Core\Kernel\KernelInterface
  , Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\Response;

class Application
{
    const PAGE_HOME = '@@HOME';

    const ROUTE_DB = 1;
    const ROUTE_PATH = 2;
    const ROUTE_ERROR = 3;

    protected $type;
    protected $userStatus;

    public function __construct(KernelInterface $kernel, Request $request, Response $response = null)
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

    public function getUserStatus()
    {
        return $this->userStatus;
    }

    public function setUserStatus($status)
    {
        $this->userStatus = $status;
    }

    public function getDirectory()
    {
        return $this->kernel->getRoot().DIRECTORY_SEPARATOR.'application';
    }

    public function getTempDirectory()
    {
        return sys_get_temp_dir();
    }

    public function getResponse()
    {
        return $this->response;
    }
}

