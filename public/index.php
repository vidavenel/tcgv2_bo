<?php

use Tcgv2\Bo\Test\Application;
use Tcgv2\Bo\Tests\Kernel;

require __DIR__ . '/helpers.php';
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/Kernel.php';
require __DIR__.'/BoServiceProvider.php';

/** @var \Illuminate\Foundation\Application $app */
$app = require __DIR__.'/../vendor/laravel/laravel/bootstrap/app.php';

$app->useEnvironmentPath(__DIR__);

$kernel = $app->make(Kernel::class);
$app->register(BoServiceProvider::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);