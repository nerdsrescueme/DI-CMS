<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , CMS\CMS
  , Twig_Loader_Filesystem
  , Twig_Extension_Debug
  , Twig_Environment
  , Twig_SimpleFunction;

/**
 * View listener
 *
 * @package Application
 * @subpackage Listeners
 */
class SetupTemplateListener extends ListenerAbstract
{
    protected $priority = 10;

    public function run(\SplSubject $event)
    {
        $site = $event->container->activeSite;
        $path = $event->container->application->getDirectory();
        $themePath = join(DIRECTORY_SEPARATOR, [$path, 'themes', $site->getTheme(), 'views']);
        $themeInfoFile = join(DIRECTORY_SEPARATOR, [$path, 'themes', $site->getTheme(), 'theme.json']);

        if (file_exists($themeInfoFile)) {
            $themeInfo = file_get_contents($themeInfoFile);
            $themeInfo = json_decode($themeInfo);
        } else {
            throw new \RuntimeException("No theme info file exists for this theme [$site->getTheme()]");
        }

        $loader = new Twig_Loader_Filesystem([
            $themePath,
            join(DIRECTORY_SEPARATOR, [$path, 'themes', 'default', 'views']),
            join(DIRECTORY_SEPARATOR, [$path, 'views']),
        ]);

        $twig   = new Twig_Environment($loader, [
            'debug' => true,
            'cache' => join(DIRECTORY_SEPARATOR, [$path, 'storage', 'cache']),
            'autoescape' => false,
        ]);

        $twig->addGlobal('cms', new CMS($event->kernel));
        $twig->addGlobal('site', $site);
        $twig->addGlobal('user', $event->container->currentUser->getUser());
        $twig->addGlobal('theme', $themeInfo);

        $twig->addExtension(new Twig_Extension_Debug());

        $event->container->themeInfo = $themeInfo;
        $event->container->twigLoader = $loader;
        $event->container->twig = $twig;
    }
}
