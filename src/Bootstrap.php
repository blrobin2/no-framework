<?php namespace Framework;

require __DIR__.'/../vendor/autoload.php';

use FastRoute\Dispatcher;
use Symfony\Component\HttpFoundation\Response;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Symfony\Component\HttpFoundation\Request;
use FastRoute\RouteCollector;

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

// Pull in all the SUPERGLOBALS into a request object
$request = Request::createFromGlobals();

// Build an empty response that we can modify depending on the circumstances.
$response = new Response(
    null,
    Response::HTTP_OK,
    array('content-type' => 'text/html')
);

$routeDefinitionCallback = function (RouteCollector $r) {
    $routes = include('Routes.php');
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
};

$dispatcher = \FastRoute\simpleDispatcher($routeDefinitionCallback);

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $response->setContent('404 - Page Not Found');
        $response->setStatusCode(404);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 - Method Not Allowed');
        $response->setStatusCode(405);
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

// Prepare and send the response
$response->prepare($request);
$response->send();