<?php

namespace CMS\Controller;

class Editor extends ControllerAbstract
{
    public function indexAction()
    {
        $data = [];
        $view = $this->twig->loadTemplate('editor/index.app.twig');

        return $view->render($data);
    }
}