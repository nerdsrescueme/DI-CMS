<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , Aura\View\Template
  , Aura\View\EscaperFactory
  , Aura\View\TemplateFinder
  , Aura\View\HelperLocator;

/**
 * View listener
 *
 * @package Application
 * @subpackage Listeners
 */
class StartupTemplateListener extends ListenerAbstract
{
    protected $priority = 2;

    public function __invoke(EventInterface $event)
    {
        $template = new Template(
            new EscaperFactory,
            new TemplateFinder,
            new HelperLocator
        );

        $event->container->template = $template;
    }
}
