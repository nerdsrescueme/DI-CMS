<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , CMS\Application;

/**
 * Database response listener
 *
 * @package Application
 * @subpackage Listeners
 */
class ResponseDatabaseListener extends ListenerAbstract
{
    protected $priority = 1;

    public function determine(EventInterface $event)
    {
        return $event->application->getType() === Application::ROUTE_DB;
    }

    public function __invoke(EventInterface $event)
    {
        $event->response->setContent('Page loaded and rendered from database');
        $event->stopPropogation();
    }
}
