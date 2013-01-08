<?php

namespace CMS\Event;

use Nerd\Core\Event\ObserverAbstract
  , Symfony\Component\HttpFoundation\Response;

class ExceptionLogObserver extends ObserverAbstract
{
    public function qualify(\SplSubject $event)
    {
        return $event->container->has('logger');
    }

    public function update(\SplSubject $event)
    {
        $logger  = $event->container->get('logger');
        $message = $event->exception->getMessage();
        $line    = $event->exception->getLine();
        $file    = $event->exception->getFile();
        $trace   = $event->exception->getTraceAsString();

        $trace = "\t".str_replace("\n", "\n\t", $trace)."\n\t"; // Format trace string.

        $logger->addError($message.PHP_EOL.$trace, [$file, $line]);
    }
}