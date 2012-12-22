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
        $file = $this->twig->loadTemplate($choices[$layout].'.twig');
        $source = $this->twig->getLoader()->getSource($file->getTemplateName());
        $file = $this->twig->getLoader()->getCacheKey($file->getTemplateName());

        if ($this->request->isMethod('post')) {
            $result = @file_put_contents($file, $this->request->request->get('content'));
            $return = ['success' => ($result > 0)];

            if ($result === false) {
                $return['message'] = error_get_last();
            }

            return $return;
        }

        $view = $this->twig->loadTemplate('editor/edit.app.twig');
        
        $data = [
            'code' => htmlentities($source),
        ];

        return $view->render($data);
    }
}