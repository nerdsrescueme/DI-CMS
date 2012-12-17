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
class TeardownListener extends ListenerAbstract
{
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        $container = $event->container;

        // Save the session to permanent storage.
        $container->request->hasSession() and $event->container->request->getSession()->save();

        // Perform an atomic save on any object that has
        // been persisted to permanent storage.
        $container->has('em') and $container->em->flush();
    }
}
