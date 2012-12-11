<?php

use Doctrine\ORM\Tools\Setup
  , Doctrine\ORM\EntityManager
  , Doctrine\ORM\Configuration;

$kernel = require '../application/bootstrap.php';

require '../application/Model/Site.php';
require '../application/Model/Page.php';


$cache = new \Doctrine\Common\Cache\ArrayCache;
$config = new Configuration;
$config->setMetadataCacheImpl($cache);
$driver = $config->newDefaultAnnotationDriver(__DIR__.'/../application/migrations');
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

$page = $em->getRepository('Page')->findAll()[0];

die(var_dump($page->getSite()->getHost()));