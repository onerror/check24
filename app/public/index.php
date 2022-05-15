<?php

use ApiControllers\DashboardDataController;
use Bramus\Router\Router;
use FrontControllers\DashboardController;
use Repositories\CustomerRepository;
use Repositories\DashboardRepository;
use Repositories\OrderRepository;
use Views\ErrorPageView;

require __DIR__ . '/../vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('test.log', Monolog\Logger::ERROR));
$router = new Router();
try {
    $testDb = new PDO(
        'mysql:dbname=test;host=mysql',
        'pyastolov',
        '123456',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    $router->set404(function () {
        header('HTTP/1.1 404 Not Found');
        require(__DIR__ . '/../src/templates/404.php');
    });
    $router->get('/', function () {
        DashboardController::mainPage();
    });
    $router->get('/api/dashboard_data', DashboardDataController::class . '@get');
    $router->get('/api/dashboard_data/{start}/{end}', function ($start, $end) use ($testDb) {
        DashboardDataController::get(
            (new DateTimeImmutable())->setTimestamp((int)$start),
            (new DateTimeImmutable())->setTimestamp((int)$end),
            new DashboardRepository($testDb),
            new OrderRepository($testDb),
            new CustomerRepository($testDb)
        );
    });
} catch (Exception$e) {
    $log->error($e->getMessage(), $e->getTrace());
    ErrorPageView::render(['error' => 'An error happened, sorry ' . $e->getMessage()]);
}
$router->run();


unset($testDb);