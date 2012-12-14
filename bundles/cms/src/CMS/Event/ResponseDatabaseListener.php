<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , CMS\Application;

/**
 * Database response listener
 *
 * @package Application
 * @subpackage Listeners
 */
class ResponseDatabaseListener extends ListenerAbstract
{
    protected $priority = 5;

    public function determine(EventInterface $event)
    {
        return $event->response->isSuccessful()
           and $event->application->getType() === Application::ROUTE_DB;
    }

    public function __invoke(EventInterface $event)
    {
        $page     = $event->container->activePage;
        $twig     = $event->container->twig;
        $info     = $event->container->themeInfo;
        $template = $twig->loadTemplate('template.html.twig');

        $twig->addGlobal('site', $event->container->activeSite);
        $twig->addGlobal('user', $event->container->currentUser->getUser());
        $twig->addGlobal('page', $page);
        $twig->addGlobal('theme', $info);

        $data = [
            'layout' => 'home',
        ];

        $event->response->setContent($template->render($data));

        $event->stopPropogation();
    }
}
