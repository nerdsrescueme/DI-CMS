<?php

namespace CMS\Controller;

class Editor extends ControllerAbstract
{
    public function indexAction()
    {
        $data = [
            'templates' => (array) $this->theme->templates,
            'layouts' => (array) $this->theme->layouts,
        ];
        $view = $this->twig->loadTemplate('editor/index.app.twig');

        return $view->render($data);
    }

    public function editAction()
    {
        $choices = array_merge((array) $this->theme->templates, (array) $this->theme->layouts);
        $layout = $this->getParam('layout');
        $file = $choices[$layout];

        $view = $this->twig->loadTemplate('editor/edit.app.twig');
        $file = $this->twig->loadTemplate($file.'.twig');
        $data = [
            'code' => htmlentities($this->twig->getLoader()->getSource($file->getTemplateName())),
        ];

        return $view->render($data);
    }
}