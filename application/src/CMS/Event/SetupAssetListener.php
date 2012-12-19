<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Assetic\Asset\FileAsset;

/**
 * View listener
 *
 * @package Application
 * @subpackage Listeners
 */
class SetupAssetListener extends ListenerAbstract
{
    protected $priority = 11;

    // We need to ignore the cms assets unless you're logged in as admin...
    public function run(\SplSubject $event)
    {
        $root  = $event->container->application->getDirectory();
        $asset = new FileAsset($root.'/assets/js/cms.js');

        $event->container->set('cmsJs', $asset->dump());
    }
}
