<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , CMS\CurrentUser;

/**
 * Startup listener
 */
class SetupListener extends ListenerAbstract
{
    protected $priority = 9;

    public function determine(EventInterface $event)
    {
        return $event->container->has('em');
    }

    public function __invoke(EventInterface $event)
    {
        $em   = $event->container->em;
        $site = $em->getRepository('\\CMS\\Model\\Site')
                   ->findOneByHost($event->container->request->getHost());

        if (!$site) {
            throw new \RuntimeException('Site not found');
        }

        $event->container->currentUser = new CurrentUser($em, $event->container->session);
        $event->container->activeSite  = $site;
    }
}