<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , Twig_Loader_Filesystem
  , Twig_Extension_Debug
  , Twig_Environment;

/**
 * View listener
 *
 * @package Application
 * @subpackage Listeners
 */
class StartupTemplateListener extends ListenerAbstract
{
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        $site      = $event->container->activeSite;
        $path      = $event->application->getDirectory();
        $themePath = join(DIRECTORY_SEPARATOR, [$path, 'themes', $site->getTheme(), 'views']);
        $themeInfo = json_decode(file_get_contents(join(DIRECTORY_SEPARATOR, [$themePath, '..', 'theme.json'])));

        $loader = new Twig_Loader_Filesystem([
            $themePath,
            join(DIRECTORY_SEPARATOR, [$path, 'themes', 'default', 'views']),
        ]);
        $twig   = new Twig_Environment($loader, [
            'debug' => true,
            'cache' => join(DIRECTORY_SEPARATOR, [$path, 'storage', 'cache']),
        ]);

        $twig->addExtension(new Twig_Extension_Debug());

        $event->container->themeInfo = $themeInfo;
        $event->container->twigLoader = $loader;
        $event->container->twig = $twig;
    }
}
