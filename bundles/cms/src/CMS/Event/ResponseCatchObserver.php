<?php

namespace CMS\Event;

use Nerd\Core\Event\ObserverAbstract
  , CMS\Application;

class ResponseCatchObserver extends ObserverAbstract
{
	public function qualify(\SplSubject $event)
	{
		return ! $event->handled;
	}

    public function update(\SplSubject $event)
    {
    	$event->container->response->setContent('Page could not be found');
    }
}