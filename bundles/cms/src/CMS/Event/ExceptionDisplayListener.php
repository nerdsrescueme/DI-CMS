<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , Symfony\Component\HttpFoundation\Response;

/**
 * Display exceptions to user
 * 
 * @todo Make environment aware? Or simply setup different listeners per env?
 * @package Application
 * @subpackage Listeners
 */
class ExceptionDisplayListener extends ListenerAbstract
{
    protected $priority = 10;

    public function __invoke(EventInterface $event)
    {
        $response = new Response();

        $message = '<b>'.$event->exception->getMessage().'</b> in '.
                   $event->exception->getFile().' on line '.
                   $event->exception->getLine();

        $message .= '<pre>'.print_r($event->exception->getTrace(), true).'</pre>';

        $response->setContent($message);
        $response->setStatusCode(500);
        $response->send();

        exit(0);
    }
}
