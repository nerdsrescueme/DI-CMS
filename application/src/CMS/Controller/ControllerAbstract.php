<?php

namespace CMS\Controller;

use Nerd\Core\Event\EventInterface;

abstract class ControllerAbstract
{
    protected $event;
    protected $params;
    protected $request;
    protected $response;
    protected $currentUser;
    protected $twig;
    protected $template;
    protected $theme;

    final public function __construct(EventInterface $event, array $params = [])
    {
        $this->event  = $event;
        $this->params = $params;
        $this->request = $event->container->request;
        $this->response = $event->container->response;
        $this->currentUser = $event->container->currentUser;
        $this->twig = $event->container->twig;
        $this->theme = $event->container->themeInfo;
    }

    public function before()
    {
        $this->template = $this->twig->loadTemplate('template.app.twig');
    }

    public function after($response)
    {
        if (is_array($response)) {
            $this->response->setContent(json_encode($response));
            $this->response->headers->set('Content-type', 'application/json; charset=UTF-8');
            return;
        }

        $data = [
            'content' => $response,
        ];

        $this->response->setContent($this->template->render($data));
    }

    protected function getParam($name, $default = null)
    {
        if (!isset($this->params[$name])) {
            return $default;
        }

        return $this->params[$name];
    }
}