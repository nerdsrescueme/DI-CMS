<?php

namespace CMS\Component;

class Navigation extends ComponentAbstract
{
    protected $name = 'navigation';

    public function render()
    {
        $name = $this->getOption('name');

        return <<<OG
Render naviation for $name
OG;
    }
}