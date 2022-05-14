<?php

use Controllers\ArticleController;
use Controllers\ArticlesController;
use Controllers\LoginController;
use Models\User;
use voku\db\DB;

require __DIR__ . '/../vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('run_app.log', Monolog\Logger::ERROR));

$pdo = new PDO('mysql:dbname=check24;host=mysql', 'pyastolov', '123456', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$db = DB::getInstance('mysql', 'pyastolov', '123456', 'test');

$routes = [
    new \DevCoder\Route('login', '/login', [LoginController::class]),
    new \DevCoder\Route(
        'articles_collection',
        '/articles',
        [ArticleController::class, 'getAll']
    ),
    new \DevCoder\Route(
        'article',
        '/article/{id}',
        [ArticleController::class, 'get']
    ),
    new \DevCoder\Route(
        'api_articles',
        '/api/articles/{page}',
        [ArticlesController::class, 'get']
    ),
];

try {
    $router = new \DevCoder\Router($routes);
    
    $route = $router->matchFromPath($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    
    $parameters = $route->getParameters();git
    // $arguments = ['id' => 2]
    $arguments = $route->getVars();
    
    $controllerName = $parameters[0];
    $methodName = $parameters[1] ?? null;
    
    $controller = new $controllerName();
    if (!is_callable($controller)) {
        $controller = [$controller, $methodName];
    }
    
    echo $controller(...array_values($arguments));
} catch (\Exception $exception) {
    header("HTTP/1.0 404 Not Found");
}

require __DIR__ . '/../src/views/partials/footer.php';

unset($pdo);