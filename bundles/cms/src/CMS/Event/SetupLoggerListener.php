<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , Monolog\Logger
  , Monolog\Handler\StreamHandler
  , Monolog\Processor\WebProcessor;

/**
 * Initialize the logger
 *
 * @package Application
 * @subpackage Listeners
 */
class SetupLoggerListener extends ListenerAbstract
{
    protected $priority = 1;

    public function __invoke(EventInterface $event)
    {
        $loggerStore = new StreamHandler(
            $event->kernel->getRoot().'/application/storage/logs/log.php'
        );

        $logger = new Logger('App');
        $logger->pushHandler($loggerStore);

        //$logger->pushProcessor(new WebProcessor());

        $event->container->set('logger', $logger);
    }
}
