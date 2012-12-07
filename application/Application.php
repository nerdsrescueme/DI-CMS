<?php

namespace Nerd\Application;

use Nerd\Kernel\KernelInterface
  , Nerd\Kernel\Aware as KernelAware
  , Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\Response;

class Application implements ApplicationInterface
{
    use KernelAware;

    public function __construct(KernelInterface $kernel, Request $request)
    {
        $this->setKernel($kernel);
    }
}