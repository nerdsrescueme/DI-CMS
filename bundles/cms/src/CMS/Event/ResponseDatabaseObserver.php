<?php

namespace CMS\Event;

use Nerd\Core\Event\ObserverAbstract
  , CMS\Application;

class ResponseDatabaseObserver extends ObserverAbstract
{
    public function qualify(\SplSubject $event)
    {
        return $event->container->response->isSuccessful()
           and $event->container->application->getType() === Application::ROUTE_DB;
    }

    public function update(\SplSubject $event)
    {
        $container = $event->container;

        $page     = $container->activePage;
        $twig     = $container->twig;
        $info     = $container->themeInfo;
        $template = $twig->loadTemplate('template.html.twig');

        $data = [
            'layout' => 'home',
            'site' => $container->activeSite,
            'user' => $container->currentUser->getUser(),
            'page' => $page,
            'theme' => $info,
        ];

        $container->response->setContent($template->render($data));
        $container->response->setLastModified($page->getUpdatedAt());
        $event->handled = true;
    }
}