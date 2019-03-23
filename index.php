<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2019
 * Time: 08:40
 */
include __DIR__ . '/vendor/autoload.php';

$engine_resolver = new \Illuminate\View\Engines\EngineResolver();
$filesystem = new \Illuminate\Filesystem\Filesystem();
$fileViewFinder = new \Illuminate\View\FileViewFinder($filesystem, ['resources/views/']);
$eventDispatcher = new \Illuminate\Events\Dispatcher();
$factory = new \Illuminate\View\Factory($engine_resolver, $fileViewFinder, $eventDispatcher);
$engine = new \Illuminate\View\Engines\FileEngine();

$view = new \Illuminate\View\View($factory, $engine, 'dashboard', __DIR__ . '/resources/views/dashboard.blade.php');
echo $view->render();
var_dump('test');