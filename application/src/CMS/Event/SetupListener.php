<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , CMS\CurrentUser;

/**
 * Startup listener
 */
class SetupListener extends ListenerAbstract
{
    protected $priority = 9;

    public function qualify(\SplSubject $event)
    {
        return $event->container->has('em');
    }

    public function run(\SplSubject $event)
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