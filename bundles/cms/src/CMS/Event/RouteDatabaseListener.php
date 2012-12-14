<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , CMS\Application;

/**
 * Database route listener
 *
 * @package Application
 * @subpackage Listeners
 */
class RouteDatabaseListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        $uri = $event->uri;

        switch($uri) {
            case '/' :
                $uri = Application::PAGE_HOME;
                break;
        }

        $page = $event->em->getRepository('\\CMS\\Model\\Page')->findOneByUri($uri);

        if ($page) {
            $event->stopPropogation();
            $event->container->activePage = $page;
            $event->application->setType(Application::ROUTE_DB);
        }
    }
}
