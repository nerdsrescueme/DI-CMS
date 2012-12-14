<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , Symfony\Components\HttpFoundation\Response
  , Symfony\Components\HttpFoundation\RedirectResponse
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
    protected $params;

    public function determine(EventInterface $event)
    {
        $params = $event->container->route->values;

        return $event->response->isSuccessful()
           and $event->application->getType() === Application::ROUTE_PATH;
    }

    public function __invoke(EventInterface $event)
    {
        $params = $event->container->route->values;
        extract($params); // $controller, $action, $area...

        $controller = '\\CMS\\Controller\\'.ucfirst($controller);

        if (!class_exists($controller)) {
            throw new \InvalidArgumentException("Controller [$controller] does not exist");
        }

        $controller = new $controller($event, $params);
        $action     = $action.'Action';
        $id         = isset($id) ? $id : null;

        if (!method_exists($controller, $action)) {
            throw new \InvalidArgumentException("Action [$action] does not exist in controller [$controller]");
        }

        $controller->before();
        $controllerResponse = $controller->{$action}($id);
        $controller->after();

        // We only stop propogating if a secondary response object is returned
        if (is_object($controllerResponse)) {
            $event->response = $controllerResponse;
        } else {
            $event->response->setContent($controllerResponse);
            $event->stopPropogation();
        }
    }
}
