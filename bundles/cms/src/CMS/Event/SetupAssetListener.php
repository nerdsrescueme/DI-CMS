<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
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
    public function __invoke(EventInterface $event)
    {
        $root  = $event->kernel->getRoot();
        $asset = new FileAsset($root.'/bundles/cms/assets/js/cms.js');

        $event->container->set('cmsJs', $asset->dump());
    }
}
