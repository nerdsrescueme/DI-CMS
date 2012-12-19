<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract;

/**
 * Request listener
 *
 * @package Application
 * @subpackage Listeners
 */
class RequestAuthenticateListener extends ListenerAbstract
{
    protected $priority = 2;

    public function run(\SplSubject $event)
    {
    	$user = $event->container->currentUser;

    	
    }
}
