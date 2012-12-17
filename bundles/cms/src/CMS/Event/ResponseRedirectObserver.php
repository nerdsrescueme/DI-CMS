<?php

namespace CMS\Event;

use Nerd\Core\Event\ObserverAbstract
  , CMS\Application;

class ResponseRedirectObserver extends ObserverAbstract
{
    public function qualify(\SplSubject $event)
    {
        return $event->container->response->isRedirection();
    }

    public function update(\SplSubject $event)
    {
    	$event->handled = true;
    }
}