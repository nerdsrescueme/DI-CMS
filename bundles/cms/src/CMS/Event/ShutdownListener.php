<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface;

/**
 * Shutdown listener
 *
 * @package Application
 * @subpackage Listeners
 */
class ShutdownListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        $event->request->getSession()->save();
    }
}
