<?php

namespace CMS\Controller;

class Site extends ControllerAbstract
{
    public function createAction()
    {
        $view = $this->twig->loadTemplate('site/create.app.twig');
        $data = [];

        return $view->render($data);
    }

    public function editAction()
    {
        $view = $this->twig->loadTemplate('site/edit.app.twig');
        $data = [];

        return $view->render($data);
    }
}