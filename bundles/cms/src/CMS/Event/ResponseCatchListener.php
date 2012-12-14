<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface;

/**
 * Catch-all response listener
 *
 * @package Application
 * @subpackage Listeners
 */
class ResponseCatchListener extends ListenerAbstract
{
    protected $priority = 100;

    public function __invoke(EventInterface $event)
    {
    	// Need to format a 404 page somehow...
        $event->response->setContent('Page could not be found');
    }
}
