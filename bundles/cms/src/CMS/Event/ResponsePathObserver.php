<?php

namespace CMS\Event;

use Nerd\Core\Event\ObserverAbstract
  , CMS\Application;

class ResponsePathObserver extends ObserverAbstract
{
    public function qualify(\SplSubject $event)
    {
        return $event->container->response->isSuccessful()
           and $event->container->application->getType() === Application::ROUTE_PATH;
    }

    public function update(\SplSubject $event)
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
            $event->container->response = $controllerResponse;
        } else {
            $event->container->response->setContent($controllerResponse);
        }

        $event->handled = true;
    }
}