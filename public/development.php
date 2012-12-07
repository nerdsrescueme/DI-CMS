<?php

use Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\Response;

$kernel   = require '../application/bootstrap.php';

$request  = Request::createFromGlobals();
$response = new Response();

die(var_dump($kernel));