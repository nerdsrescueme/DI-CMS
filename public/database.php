<?php

use Doctrine\ORM\Tools\Setup
  , Doctrine\ORM\EntityManager
  , Doctrine\ORM\Configuration;

$kernel = require '../application/bootstrap.php';
$kernel->registerBundle('CMS');

$cache = new \Doctrine\Common\Cache\ArrayCache;
$config = new Configuration;
$driver = $config->newDefaultAnnotationDriver(__DIR__.'/../application/migrations');
$config->setMetadataCacheImpl($cache);
$config->setMetadataDriverImpl($driver);
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__.'/../application/Proxies');
$config->setProxyNamespace('Proxies');


$em = EntityManager::create([
	'driver' => 'pdo_mysql',
	'user' => 'root',
	'password' => '',
	'dbname' => 'new_nerd',
], $config);

//$page  = $em->getRepository('\\CMS\\Model\\Page')->findAll()[0];
//$user  = $em->getRepository('\\CMS\\Model\\User')->findAll();
//$site  = $em->getRepository('\\CMS\\Model\\Site')->findAll()[0];

$user = $em->getRepository('\\CMS\\Model\\User')->findAll()[0];

//var_dump($user->getMetadata()->getFirstName());

$query = $em->createQueryBuilder();
$state = $query->select('s')
               ->from('\\CMS\\Model\\State', 's')
               ->setMaxResults(1)
               ->getQuery()
               ->getSingleResult();

$query  = $em->createQueryBuilder();
$cities = $query->select('c')
               ->from('\\CMS\\Model\\City', 'c')
               ->where('c.state = :state')
               ->setParameter('state', $state->getCode())
               ->setMaxResults(10)
               ->getQuery()
               ->getResult();

die(var_dump($cities));