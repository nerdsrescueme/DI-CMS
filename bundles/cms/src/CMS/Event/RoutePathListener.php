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

        return $allowed;
    }

    public function __invoke(EventInterface $event)
    {
        $request = $event->container->request;
        $router  = new Map(new DefinitionFactory, new RouteFactory);
        $mapper  = require join(DIRECTORY_SEPARATOR, [$event->container->application->getDirectory(), 'config', 'routes.php']);

        // Closure returned above sets routes on the router object
        $mapper($router); // Cache object

        $route = $router->match($request->getPathInfo(), $request->server->all());

        if ($route) {
            $event->stopPropogation();
            $event->container->router = $router;
            $event->container->route  = $route;
            $event->container->application->setType(Application::ROUTE_PATH);
        }
    }
}
