<?php
;
use FrontControllers\DashboardController;

require __DIR__ . '/../vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('test.log', Monolog\Logger::ERROR));

$pdo = new PDO('mysql:dbname=test;host=mysql', 'pyastolov', '123456', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$router = new \Bramus\Router\Router();

$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    require (__DIR__ . '/../src/templates/404.php');
});
$router->get('/', DashboardController::class.'@mainPage');

$router->run();


unset($pdo);