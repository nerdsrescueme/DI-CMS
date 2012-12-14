<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface;

/**
 * Forbidden response listener
 *
 * Prevents subsequent response handlers from being triggered if the response
 * indicates some invalid access.
 *
 * @package Application
 * @subpackage Listeners
 */
class ResponseRedirectListener extends ListenerAbstract
{
    protected $priority = 1;

    public function determine(EventInterface $event)
    {
    	return $event->response->isForbidden();
    }

    public function __invoke(EventInterface $event)
    {
        $event->stopPropogation();
    }
}
