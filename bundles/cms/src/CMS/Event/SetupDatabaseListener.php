<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Nerd\Core\Event\EventInterface
  , Doctrine\Common\Cache\ApcCache
  , Doctrine\Common\Cache\ArrayCache
  , Doctrine\ORM\EntityManager
  , Doctrine\ORM\Configuration;

/**
 * Database listener
 *
 * @package Application
 * @subpackage Listeners
 */
class SetupDatabaseListener extends ListenerAbstract
{
    protected $priority = 3;

    public function __invoke(EventInterface $event)
    {
        // $cache  = new ApcCache;
        $cache  = new ArrayCache;
        $config = new Configuration;
        $driver = $config->newDefaultAnnotationDriver(__DIR__.'/../Model');
        $config->setMetadataDriverImpl($driver);
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);
        $config->setProxyDir($event->container->application->getDirectory().'/storage/proxies');
        $config->setProxyNamespace('Proxies');
        $config->setAutoGenerateProxyClasses(true);

        $em = EntityManager::create([
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'new_nerd',
        ], $config);

        $event->container->em = $em;
    }
}
