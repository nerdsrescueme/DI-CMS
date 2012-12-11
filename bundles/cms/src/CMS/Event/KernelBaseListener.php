<?php

namespace CMS\Event;

use Nerd\Core\Kernel\Kernel
  , Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface;

abstract class KernelBaseListener extends ListenerAbstract
{
    protected $priority = 1;
    protected $kernel;
    protected $environment;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
        $this->environment = $kernel->getEnvironment();
    }

    public function __invoke(EventInterface $event)
    {
        echo get_called_class().': Fill in<br>'.PHP_EOL;
    }
}