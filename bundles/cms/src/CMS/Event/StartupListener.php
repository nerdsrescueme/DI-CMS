<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , CMS\CurrentUser;

/**
 * Startup listener
 */
class StartupListener extends ListenerAbstract
{
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        $em   = $event->container->entityManager;
        $site = $em->getRepository('\\CMS\\Model\\Site')
                   ->findOneByHost($event->request->getHost());

        if (!$site) {
            throw new \RuntimeException('Site not found');
        }

        $event->container->currentUser = new CurrentUser($em, $event->container->session);
        $event->container->activeSite  = $site;
    }
}