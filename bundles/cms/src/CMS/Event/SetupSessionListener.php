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
class SetupSessionListener extends ListenerAbstract
{
    protected $priority = 4;

    public function __invoke(EventInterface $event)
    {
        $request      = $event->container->request;
        $sessionStore = new NativeSessionStorage([
            'save_path' => '4;'.$event->container->application->getDirectory().'/storage/sessions/',
            'name' => 'NERDSESS',
        ]);

        $request->setSession(new Session($sessionStore));
        $request->getSession()->start();

        $event->container->session = $request->getSession();
    }
}
