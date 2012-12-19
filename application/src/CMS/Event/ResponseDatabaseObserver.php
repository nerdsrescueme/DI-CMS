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

        // Temporary
        $content = $template->render($data);
        $content = str_replace(
            '</html>', 
            '<script src="/di/public/assets/cms.js"></script>
<script src="/di/public/assets/plugins.js"></script>
<script>$(\'[data-editable]\').editor({
    autoEnable: false,
    replace: true,
    enableUi: true,
    draggable: true,
    ui: {
        textBold: true,
        textItalic: true,
        textUnderline: true,
        textStrike: true,
        quoteBlock: true,
        fontSizeInc: true,
        fontSizeDec: true,
        image: true
    },
    plugins: {
        dock: {
            docked: true,
            dockToElement: false
        },
        image: {
            classes: ["bordered", "left", "right"]
        }
    }
});</script>
             </html>', 
            $content
        );

        $container->response->setContent($content);
        $container->response->setLastModified($page->getUpdatedAt());
        $event->handled = true;
    }
}