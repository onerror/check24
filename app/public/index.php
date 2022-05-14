<?php

use ApiControllers\DashboardDataController;
use FrontControllers\DashboardController;

require __DIR__ . '/../vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('test.log', Monolog\Logger::ERROR));
$router = new \Bramus\Router\Router();
try {
    $pdo = new PDO('mysql:dbname=test;host=mysql', 'pyastolov', '123456', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    $router->set404(function () {
        header('HTTP/1.1 404 Not Found');
        require(__DIR__ . '/../src/templates/404.php');
    });
    $router->get('/', function () {
        DashboardController::mainPage();
    });
    $router->get('/api/dashboard_data', DashboardDataController::class . '@get');
    $router->get('/api/dashboard_data/{start}/{end}', function ($start, $end) {
        DashboardDataController::get(
            (new \DateTimeImmutable())->setTimestamp($start),
            (new \DateTimeImmutable())->setTimestamp($end)
        );
    });
} catch (Exception$e) {
    $log->error($e->getMessage(), $e->getTrace());
    \Views\ErrorPageView::render(['error' => 'An error happened, sorry ' . $e->getMessage()]);
}
$router->run();


unset($pdo);