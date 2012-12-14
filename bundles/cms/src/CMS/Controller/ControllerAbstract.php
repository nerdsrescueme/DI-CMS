<?php

namespace CMS\Controller;

use Nerd\Core\Event\EventInterface;

abstract class ControllerAbstract
{
	protected $event;
	protected $params;

	final public function __construct(EventInterface $event, array $params = [])
	{
		$this->event  = $event;
		$this->params = $params;
	}

	public function before()
	{

	}

	public function after()
	{
		
	}

	protected function getParam($name, $default = null)
	{
		if (!isset($this->params[$name])) {
			return $default;
		}

		return $this->params[$name];
	}
}