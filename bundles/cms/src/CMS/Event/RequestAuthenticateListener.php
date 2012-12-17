<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface;

/**
 * Request listener
 *
 * @package Application
 * @subpackage Listeners
 */
class RequestAuthenticateListener extends ListenerAbstract
{
    protected $priority = 2;

    public function __invoke(EventInterface $event)
    {
    	$user = $event->container->currentUser;

    	
    }
}
