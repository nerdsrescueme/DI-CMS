<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface;

/**
 * Request listener
 *
 * @package Application
 * @subpackage Listeners
 */
class RequestListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        // If the user is not logged in… don't do anything else with the request
        if (!$event->container->currentUser->check()) {
            $this->stopPropogation();
        }
    }
}
