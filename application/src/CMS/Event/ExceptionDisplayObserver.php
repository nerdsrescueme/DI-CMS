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

            $message = '<b>'.$event->exception->getMessage().'</b> in '.
                       $event->exception->getFile().' on line '.
                       $event->exception->getLine();

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