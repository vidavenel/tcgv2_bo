<?php
/**
 * Created by PhpStorm.
 * User: vince
 * Date: 10/03/2019
 * Time: 16:53
 */

use Illuminate\Http\Request;
use Mejta\StandaloneBlade;

require __DIR__ . '/../vendor/autoload.php';

function view($view, $data)
{
    $viewDirs = [
        __DIR__ . '/../resources/views',
    ];
    $cacheDir = __DIR__ . '/cache';
    $engine = new StandaloneBlade($viewDirs, $cacheDir);
    // Render template
    echo $engine->render($view, $data);
}


$request = Request::capture();
$response = new \Tcgv2\Bo\Responses\DashboardResponse();
$response->toResponse($request);