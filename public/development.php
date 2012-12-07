<?php

use Symfony\Component\HttpFoundation\Request;

$kernel   = require '../application/bootstrap.php';
$request  = Request::createFromGlobals();

require '../application/ApplicationAbstract.php';
require '../application/Application.php';

$application = new Application($kernel, $request);
$kernel->registerBundle('Definition');
$application->startup();
$response = $application->handle();
$response->prepare($request);
$response->send();
$application->shutdown();