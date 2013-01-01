<?php

namespace CMS\Component;

class OpenGraph extends ComponentAbstract
{
    protected $name = 'open-graph';

    public function render()
    {
        $title = $this->getOption('title');
        $type  = $this->getOption('type');
        $url   = $this->getOption('url');
        $image = $this->getOption('image');
        $site  = $this->getOption('name');
        $admin = $this->getOption('admins');

        return <<<OG
    <!-- Open Graph Meta -->
    <meta property="og:title" content="$title">
    <meta property="og:type" content="$type">
    <meta property="og:url" content="$url">
    <meta property="og:image" content="$image">
    <meta property="og:site_name" content="$site">
    <meta property="fb:admins" content="$admin">
OG;
    }
}