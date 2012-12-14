<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , Symfony\Component\HttpFoundation\Session\Session
  , Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

/**
 * Session listener
 *
 * @package Application
 * @subpackage Listeners
 */
class StartupSessionListener extends ListenerAbstract
{
    protected $priority = 4;

    public function __invoke(EventInterface $event)
    {
        $sessionStore = new NativeSessionStorage([
            'save_path' => '4;'.$event->application->getDirectory().'/storage/sessions/',
            'name' => 'NERDSESS',
        ]);

        $event->request->setSession(new Session($sessionStore));
        $event->request->getSession()->start();

        $event->container->session = $event->request->getSession();
    }
}
