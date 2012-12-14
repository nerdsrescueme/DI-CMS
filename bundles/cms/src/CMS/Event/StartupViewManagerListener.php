<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , Nerd\View\Manager
  , Nerd\View\Locator\FileLocator;

/**
 * View listener
 *
 * @package Application
 * @subpackage Listeners
 */
class StartupViewManagerListener extends ListenerAbstract
{
    protected $priority = 2;

    public function __invoke(EventInterface $event)
    {
        $vm = new Manager(
            new FileLocator(
                $event->application->getDirectory().DIRECTORY_SEPARATOR.'views'
            )
        );

        $event->container->viewManager = $vm;
    }
}
