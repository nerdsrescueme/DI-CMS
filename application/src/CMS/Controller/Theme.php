<?php

namespace CMS\Controller;

class Theme extends ControllerAbstract
{
    public function editAction()
    {
        $view = $this->twig->loadTemplate('theme/edit.app.twig');
        $data = [];

        return $view->render($data);
    }
}