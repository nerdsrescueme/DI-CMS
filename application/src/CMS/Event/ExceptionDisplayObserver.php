<?php

namespace CMS\Event;

use Nerd\Core\Event\ObserverAbstract
  , Symfony\Component\HttpFoundation\Response;

class ExceptionDisplayObserver extends ObserverAbstract
{
    public function update(\SplSubject $event)
    {
        try {
            $response = new Response();

            $message = '<h1>'.$event->exception->getMessage().'</h1>'.
                       '<h3>'.$event->exception->getFile().' on line '.
                       $event->exception->getLine().'</h3>';

            $message .= '<pre>'.$event->exception->getTraceAsString().'</pre>';

            $response->setContent($message);
            $response->setStatusCode(500);
            $response->send();
        } catch (\Exception $e) {
            die('An unknown error has occurred');
        }

        exit(0);
    }
}