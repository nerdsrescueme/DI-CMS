<?php

namespace CMS\Event {

    use Nerd\Core\Event\ListenerAbstract
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
            $site      = $event->container->activeSite;
            $path      = $event->container->application->getDirectory();
            $themePath = join(DIRECTORY_SEPARATOR, [$path, 'themes', $site->getTheme(), 'views']);

            $themeInfoFile = join(DIRECTORY_SEPARATOR, [$themePath, '..', 'theme.json']);

            if (file_exists($themeInfoFile)) {
                $themeInfo = file_get_contents($themeInfoFile);
                $themeInfo = json_decode($themeInfo);
            } else {
                throw new \RuntimeException("No theme info file exists for this theme [$site->theme]");
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

            $twig->addExtension(new Twig_Extension_Debug());
            $twig->addFunction(new Twig_SimpleFunction('cms_global', 'cms_global', ['is_safe' => ['html', 'javascript']]));
            $twig->addFunction(new Twig_SimpleFunction('cms_local', 'cms_local', ['is_safe' => ['html', 'javascript']]));
            $twig->addFunction(new Twig_SimpleFunction('cms_component', 'cms_component', ['is_safe' => ['html', 'javascript']]));

            $event->container->themeInfo = $themeInfo;
            $event->container->twigLoader = $loader;
            $event->container->twig = $twig;
        }
    }
}

namespace {

    function cms_global($name) {
        $kernel = $GLOBALS['kernel'];
        $page = $kernel->getContainer()->get('activePage');
        $region = $page->getRegion($name);

        return $region ? $region->getData() : "Global content area: $name";
    }

    function cms_local($name) {
        $kernel = $GLOBALS['kernel'];
        $page = $kernel->getContainer()->get('activePage');
        $region = $page->getRegion($name);

        return $region ? $region->getData() : "Local content area: $name";
    }

    function cms_component($name, $options = []) {
        $kernel = $GLOBALS['kernel'];
        $page = $kernel->getContainer()->get('activePage');
        $component = $page->getComponent($name);

        return $component ? $component->getData() : "Component: $name";
    }
}
