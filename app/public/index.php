<?php

use Controllers\DashboardController;

require __DIR__ . '/../vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('test.log', Monolog\Logger::ERROR));


$pdo = new PDO('mysql:dbname=check24;host=mysql', 'pyastolov', '123456', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);




unset($pdo);