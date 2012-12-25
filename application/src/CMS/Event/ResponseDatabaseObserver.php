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
        $template = $twig->loadTemplate('template.html.twig');

        $data = [
            'layout' => 'home',
            'page' => $page,
        ];

        // Temporary
        $content = $template->render($data);
        $content = str_replace(
            '</html>', 
            '<script src="/assets/js/cms.js"></script>
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
})</script>
             </html>', 
            $content
        );

        $container->response->setContent($content);
        $container->response->setLastModified($page->getUpdatedAt());
        $event->handled = true;
    }
}