<?php

namespace CMS\Event;

use Nerd\Core\Event\EventInterface;

class KernelShutdownListener extends KernelBaseListener
{
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        
    }
}