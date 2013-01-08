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
		if (isset($this->options[$name])) {
			return $this->options[$name];
		}
	}

	public function getOptions()
	{
		return $this->options;
	}

	abstract public function  render();
}