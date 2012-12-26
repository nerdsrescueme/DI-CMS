<?php

namespace CMS;

use Nerd\Core\Kernel\KernelInterface;

/**
 * CMS Twig functions
 */
class CMS
{
    private $_kernel;

    /**
     *
     */
    public function __construct(KernelInterface $kernel)
    {
        $this->_kernel = $kernel;
    }

    /**
     *
     */
    public function asset($path)
    {
        $request = $this->_kernel->getContainer()->get('request');
        return $request->getBasePath().'/'.trim($path, '/');
    }

    /**
     *
     */
    public function url($path)
    {
        $request = $this->_kernel->getContainer()->get('request');
        return $request->getBasePath().'/'.trim($path, '/');
    }

    /**
     *
     */
    public function region($type, $name)
    {
        $page = $this->_kernel->getContainer()->get('activePage');
        $region = $page->getRegion($name);

        $out = "<div data-content-id=\"$name\" data-editable=\"$type\">"
             . ($region ? $region->getData() : "Region: $name ($type)")
             . "</div>";

        return $out;
    }

    /**
     *
     */
    public function component($name, array $options = [])
    {
        $page = $this->_kernel->getContainer()->get('activePage');
        $component = $page->getComponent($name);

        $class = str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
        $class = '\\CMS\\Component\\'.$class;
        $class = new $class($options);

        // Set up component...
        return $class->render();
    }
}