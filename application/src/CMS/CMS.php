<?php

namespace CMS;

use Nerd\Core\Kernel\KernelInterface;

class CMS
{
	private $kernel;

	public function __construct(KernelInterface $kernel)
	{
		$this->kernel = $kernel;
	}

	public function region($type, $name)
	{
        $page = $this->kernel->getContainer()->get('activePage');
        $region = $page->getRegion($name);

        $out = "<div id=\"$name\" data-editable=\"$type\">"
             . ($region ? $region->getData() : "Region: $name ($type)")
             . "</div>";

        return $out;
	}

	public function component($name, array $options = [])
	{
		$page = $this->kernel->getContainer()->get('activePage');
		$component = $page->getComponent($name);

		$class = str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
		$class = '\\CMS\\Component\\'.$class;
		$class = new $class($options);

		// Set up component...
		return $class->render();
	}
}