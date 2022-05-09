<?php

use Controllers\ArticleController;
use Controllers\ArticlesController;
use Controllers\LoginController;
use Models\User;
use voku\db\DB;

require __DIR__ . '/../vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('run_app.log', Monolog\Logger::ERROR));

require __DIR__.'/../src/views/partials/header.php';
$pdo = new PDO('mysql:dbname=check24;host=mysql', 'pyastolov', '123456', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$db = DB::getInstance('mysql', 'pyastolov', '123456', 'check24');

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
    
    $parameters = $route->getParameters();
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

////$user = new User();
////$user->fetch(1);
//
//var_dump($user);
//die();


//$request = $_SERVER['REQUEST_URI'];
//
//
//switch ($request) {
//    case 'api':
//    case '':
//    case '/' :
//        require __DIR__ . '/../src/views/index.php';
//        break;
//    case '/login' :
//        require __DIR__ . '/../src/views/login.php';
//        break;
//    case '/logout' :
//        require __DIR__ . '/../src/views/logout.php';
//        break;
//    default:
//        http_response_code(404);
//        require __DIR__ . '/../src/views/404.php';
//        break;
//
//}

require __DIR__ . '/../src/views/partials/footer.php';

unset($pdo);