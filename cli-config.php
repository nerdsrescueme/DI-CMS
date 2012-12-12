<?php

$config = new \Doctrine\ORM\Configuration();
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$driverImpl = $config->newDefaultAnnotationDriver(array(__DIR__."/bundles/cms/src/CMS/Model"));
$config->setMetadataDriverImpl($driverImpl);

$config->setProxyDir(__DIR__ . '/application/Proxies');
$config->setProxyNamespace('Proxies');

$connectionOptions = array(
    'driver' => 'pdo_mysql',
	'user' => 'root',
	'password' => '',
	'dbname' => 'new_nerd',
);

$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

$helpers = new Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));