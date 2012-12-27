<?php

namespace CMS\Controller;

class Content extends ControllerAbstract
{
    public function saveAction()
    {
        $status = 200;
        $return = 'Saved: ';
        $page = $this->request->server->get('HTTP_REFERER');
        $uri = $this->request->getSchemeAndHttpHost().$this->request->getBaseUrl();
        $em = $this->event->container->em;
        $page = str_replace($uri, '', $page);

        switch ($page) {
            case '/':
                $page = '@@HOME';
                break;
        }

        $page = $em->getRepository('\\CMS\\Model\\Page')->findOneByUri($page);

        if ($page and $this->request->isMethod('post')) {
            $content = $this->request->request->get('content');
            $blocks = json_decode($content, true);

            if (!$blocks) {
                $status = 500;
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $return = 'Error reading content';
                }
                $return = 'No content posted';
            } else {
                $key = key($blocks);
                $content = current($blocks);

                // Find globally
                $region = $em->getRepository('\\CMS\\Model\\GlobalRegion')->findOneByKey($key);

                // If not, find locally
                if (!$region) {
                    $region = $page->getRegion($key);

                    // Create a new local region
                    if (!$region) {
                        $region = new \CMS\Model\Region();
                        $page->addRegion($region);
                    }
                }

                $region->setKey($key);
                $region->setData($content);
                $em->persist($page);
                $em->persist($region);

                $return = 'Saved content block: '.key($blocks);
            }
        }

        $this->renderTemplate = false;
        $this->response->setStatusCode($status);

        return $return;
    }
}
