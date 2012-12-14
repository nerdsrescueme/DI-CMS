<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , CMS\Application;

/**
 * Path response listener
 *
 * @package Application
 * @subpackage Listeners
 */
class ResponsePathListener extends ListenerAbstract
{
    protected $priority = 6;

    public function determine(EventInterface $event)
    {
        return $event->response->isSuccessful()
           and $event->application->getType() === Application::ROUTE_PATH;
    }

    public function __invoke(EventInterface $event)
    {
        $event->response->setContent('Page loaded and rendered from file');
        $event->stopPropogation();
    }
}
