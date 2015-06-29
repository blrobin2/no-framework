<?php namespace Framework;

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Symfony\Component\HttpFoundation\Request;

error_reporting(E_ALL);

$environment = 'development';

/**
 * Register the error handler
 */
$whoops = new Run;
if ($environment !== 'production') {
    $whoops->pushHandler(new PrettyPageHandler());
} else {
    $whoops->pushHandler(function($e) {
        echo 'Friendly error page and send an email to the developer';
    });
}
$whoops->register();

$request = Request::createFromGlobals();
$response = new Response(
    'Content',
    Response::HTTP_OK,
    array('content-type' => 'text/html')
);

// Sample success
//$content = '<h1>Hello World</h1>';
//$response->setContent($content);

// Sample 404
//$response->setContent('404 - Page not found');
//$response->setStatusCode(404);

$response->prepare($request);
$response->send();