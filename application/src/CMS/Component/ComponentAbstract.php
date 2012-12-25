<?php

namespace CMS\Component;

abstract class ComponentAbstract
{
	protected $name;
	protected $options;

	public function __construct(array $options = [])
	{
		$this->options = $options;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getOption($name)
	{
		if (isset($this->option[$name])) {
			return $this->option[$name];
		}
	}

	abstract public function  render();
}