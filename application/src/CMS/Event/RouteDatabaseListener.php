<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
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

    public function qualify(\SplSubject $event)
    {
        return $event->container->has('em');
    }

    public function run(\SplSubject $event)
    {
        $uri = $event->container->request->getPathInfo();

        switch($uri) {
            case '/' :
                $uri = Application::PAGE_HOME;
                break;
        }

        $page = $event->container->em->getRepository('\\CMS\\Model\\Page')->findOneByUri($uri);

        if ($page) {
            $event->stopPropogation();
            $event->container->activePage = $page;
            $event->container->application->setType(Application::ROUTE_DB);
        }
    }
}
