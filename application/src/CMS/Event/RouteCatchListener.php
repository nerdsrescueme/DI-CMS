<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , CMS\Application;

/**
 * Catch-all route listener
 *
 * @package Application
 * @subpackage Listeners
 */
class RouteCatchListener extends ListenerAbstract
{
    protected $priority = 100;

    public function run(\SplSubject $event)
    {
        $event->container->application->setType(Application::ROUTE_ERROR);
    }
}
