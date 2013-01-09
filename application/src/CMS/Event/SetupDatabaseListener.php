<?php

namespace CMS\Event;

use Nerd\Core\Event\ListenerAbstract
  , Doctrine\Common\Cache\ApcCache
  , Doctrine\Common\Cache\ArrayCache
  , Doctrine\ORM\EntityManager
  , Doctrine\ORM\Configuration;

//use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * Database listener
 *
 * @package Application
 * @subpackage Listeners
 */
class SetupDatabaseListener extends ListenerAbstract
{
    protected $priority = 3;

    public function run(\SplSubject $event)
    {
        $dir = $event->container->application->getDirectory();
        $root = $event->kernel->getRoot();

        // $cache  = new ApcCache;
        $cache  = new ArrayCache;
        $config = new Configuration;
        $driver = $config->newDefaultAnnotationDriver(__DIR__.'/../Model');
        $config->setMetadataDriverImpl($driver);
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);
        $config->setProxyDir($dir.'/storage/proxies');
        $config->setProxyNamespace('Proxies');
        $config->setAutoGenerateProxyClasses(true);

        $em = EntityManager::create([
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'new_nerd',
        ], $config);

        // Register symfony annotations in annotations.
        $constraintPath = join(DIRECTORY_SEPARATOR, [$root, 'vendor', 'symfony', 'validator']);
        AnnotationRegistry::registerAutoloadNamespace("Symfony\Component\Validator\Constraint", $constraintPath);

        $event->container->em = $em;
    }
}
