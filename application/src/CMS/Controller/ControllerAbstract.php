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

    final public function __construct(EventInterface $event, array $params = [])
    {
        $this->event  = $event;
        $this->params = $params;
        $this->request = $event->container->request;
        $this->response = $event->container->response;
        $this->currentUser = $event->container->currentUser;
        $this->twig = $event->container->twig;
    }

    public function before()
    {
        $this->template = $this->twig->loadTemplate('template.app.twig');
    }

    public function after($response)
    {
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