<?php

namespace CMS\Event;

use Nerd\Core\Event\ObserverAbstract
  , Symfony\Component\HttpFoundation\Response;

class ExceptionDisplayObserver extends ObserverAbstract
{
    public function update(\SplSubject $event)
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