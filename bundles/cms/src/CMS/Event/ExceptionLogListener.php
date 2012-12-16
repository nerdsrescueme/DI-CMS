<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface;

/**
 * Log exceptions via Monolog
 *
 * @package Application
 * @subpackage Listeners
 */
class ExceptionLogListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        $logger = $event->container->logger;

        if (!$logger) {
            return;
        }

        $message = $event->exception->getMessage();
        $line    = $event->exception->getLine();
        $file    = $event->exception->getFile();
        $stack   = $event->exception->getTrace();

        $logger->addWarning($message, [$file, $line, $trace]);
    }
}
