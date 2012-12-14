<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , Aura\Router\Map
  , Aura\Router\DefinitionFactory
  , Aura\Router\RouteFactory
  , CMS\Application;

/**
 * Path route listener
 *
 * @package Application
 * @subpackage Listeners
 */
class RoutePathListener extends ListenerAbstract
{
    protected $priority = 2;

    public function determine(EventInterface $event)
    {
        // User must be authenticated to access this resource, also
        // we need to add role checking to ensure we can get here...
        $allowed = (bool) $event->container->currentUser;

        // Tag this response as forbidden and stop routing...
        if (!$allowed) {
            $event->response->setStatusCode(403);
            $event->application->setType(Application::ROUTE_ERROR);
            $event->stopPropogation();
        }

        return $allowed;
    }

    public function __invoke(EventInterface $event)
    {
        $router = new Map(new DefinitionFactory, new RouteFactory);
        $router->add(null, '/{:controller}/{:action}/{:id:(\d+)}'); // Get map file?

        $route = $router->match($event->uri, $_SERVER);

        if ($route) {
            $event->stopPropogation();
            $event->container->router = $router;
            $event->container->route  = $route;
            $event->application->setType(Application::ROUTE_PATH);
        }
    }
}
