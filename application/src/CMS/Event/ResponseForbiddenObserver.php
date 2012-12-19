<?php

namespace CMS\Event;

use Nerd\Core\Event\ObserverAbstract
  , CMS\Application;

class ResponseForbiddenObserver extends ObserverAbstract
{
    public function qualify(\SplSubject $event)
    {
        return $event->container->response->isForbidden();
    }

    public function update(\SplSubject $event)
    {
    	$event->handled = true;
    }
}