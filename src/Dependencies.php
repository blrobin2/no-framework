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

return $injector;