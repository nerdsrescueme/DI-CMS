<?php

use Doctrine\ORM\Tools\Setup
  , Doctrine\ORM\EntityManager
  , Doctrine\ORM\Configuration
  , Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\Session\Session
  , Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

$kernel = require '../application/bootstrap.php';
$kernel->registerBundle('CMS');

$cache  = new \Doctrine\Common\Cache\ArrayCache;
$config = new Configuration;
$driver = $config->newDefaultAnnotationDriver(__DIR__.'/../application/migrations');
$config->setMetadataCacheImpl($cache);
$config->setMetadataDriverImpl($driver);
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__.'/../application/storage/proxies');
$config->setProxyNamespace('Proxies');


$em = EntityManager::create([
	'driver' => 'pdo_mysql',
	'user' => 'root',
	'password' => '',
	'dbname' => 'new_nerd',
], $config);


//$page  = $em->getRepository('\\CMS\\Model\\Page')->findAll()[0];
//$site  = $em->getRepository('\\CMS\\Model\\Site')->findAll()[0];


$page = $em->find('\\CMS\\Model\\Page', 1);

echo '<strong>Components</strong><br>';
foreach ($page->getComponents() as $component) {
	echo $component->getKey().'<br>';
}

echo '<strong>Regions</strong><br>';
foreach ($page->getRegions() as $region) {
	echo $region->getKey().'<br>';
}

echo '<strong>Snippets</strong><br>';
foreach ($page->getSnippets() as $snippet) {
	echo $snippet->getKey().'<br>';
}

die('');

