<?php

// In case one is using PHP 5.4's built-in server
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

// Require composer autoloader
//require __DIR__ . '/vendor/autoload.php';

// Create Router instance
require_once __DIR__ . '/router/src/Bramus/Router/Router.php';
$router = new \Bramus\Router\Router();

// Define routes

//homepage
$router->get('/', function () {
   require("view/home.php");
});

$router->get('/index.php', function () {
    require("view/home.php");
 });

 $router->get('/inscription.php', function () {
    require("view/inscription.php");
 });

$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    require("404.php");
});


// Run thr router
$router->run();
?>