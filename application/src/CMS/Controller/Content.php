<?php

namespace CMS\Controller;

class Content extends ControllerAbstract
{
    public function saveAction()
    {
        $status = 200;
        $return = 'Saved: ';

        if ($this->request->isMethod('post')) {
            $content = $this->request->request->get('content');
            $blocks = json_decode($content, true);

            if (!$blocks) {
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $return = 'Error reading content';
                }
                $return = 'No content posted';
            } else {
                $return = 'Saved content block: '.key($blocks);
            }
        }

        $this->renderTemplate = false;
        $this->response->setStatusCode($status);

        return $return;
    }
}