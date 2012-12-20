<?php

use Nerd\Core\Kernel\Kernel;

// Bootstrap the kernel and CMS bundle
$kernel = require '../application/bootstrap.php';
$kernel->getContainer()->loader->add('CMS', __DIR__.'/../application/src/');


// Register exception handlers for this application
$exception = $kernel->getContainer()->exceptionNotifier;
$exception
    ->attach(new \CMS\Event\ExceptionLogObserver)
    ->attach(new \CMS\Event\ExceptionDisplayObserver);


$form = new \Nerd\Form\Form;
$form->wrap('<p>', '</p>');
  $un = $form->field('text');
  $un->label('Username');
  $pw = $form->field('password');
  $pw->label('Password');
echo $form;

