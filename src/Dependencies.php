<?php

$injector = new Auryn\Injector;

$injector->share('Framework\Http\Request');
$injector->define('Framework\Http\Request', [
    ':query' => $_GET,
    ':request' => $_POST,
    '' => array(),
    ':server' => $_SERVER,
    ':files' => $_FILES,
    ':cookies' => $_COOKIE,
]);

$injector->share('Framework\Http\Response');

$injector->define('League\Plates\Engine', [
    ':directory' => __DIR__.'/../templates',
]);

$injector->alias('Framework\Templates\Renderer', 'Framework\Templates\PlatesRenderer');
$injector->share('Framework\Templates\PlatesRenderer');

$injector->define('Framework\Page\FilePageReader', [
    ':pageFolder' => __DIR__.'/../pages',
]);
$injector->alias('Framework\Page\PageReader', 'Framework\Page\FilePageReader');
$injector->share('Framework\Page\FilePageReader');


return $injector;