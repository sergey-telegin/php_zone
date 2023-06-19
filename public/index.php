<?php
use App\MyProject\Controllers\MainController;
use App\MyProject\Controllers\ArticlesController;

$loadClass = function (string $className) {
    $path = 'var/www/html/src/'.$className . '.php';
    $path = str_replace('\\', '/', $path);
    require_once '/' . str_replace('App/','',$path);
};

spl_autoload_register($loadClass);

$route = $_SERVER['REQUEST_URI'] ?? '';
$routes = require __DIR__ . '/../src/routes.php';

$isRouteFound = false;

foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}


unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);

var_dump(App\MyProject\Services\Db::getInstancesCount());