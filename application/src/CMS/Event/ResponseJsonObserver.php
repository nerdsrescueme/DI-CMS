<?php

namespace CMS\Event;

use Nerd\Core\Event\ObserverAbstract
  , CMS\Application;

class ResponseJsonObserver extends ObserverAbstract
{
    public function qualify(\SplSubject $event)
    {
        return $event->container->response->isSuccessful()
           and $event->container->application->getType() === Application::ROUTE_PATH;
    }

    public function update(\SplSubject $event)
    {
    	$event->handled = true;
    }
}