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
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        $event->response->setContent('Page could not be found');
    }
}
