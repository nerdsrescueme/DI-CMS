<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface;

/**
 * Redirecting response listener
 *
 * Prevents subsequent response handlers from being triggered if the response
 * has been found to be a redirect.
 *
 * @package Application
 * @subpackage Listeners
 */
class ResponseRedirectListener extends ListenerAbstract
{
    protected $priority = 2;

    public function determine(EventInterface $event)
    {
    	return $event->response->isRedirection();
    }

    public function __invoke(EventInterface $event)
    {
        $event->stopPropogation();
    }
}
