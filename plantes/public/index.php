<?php




$loader = require '../vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];
$uri = parse_url($request, PHP_URL_PATH);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();



switch ($uri) {
    case '/' :
        require __DIR__ . '/pages/homepage.php';
        break;
    case '/plante':
        require __DIR__ . '/pages/plante.php';
        break;
    case '/add_plantes':
        require __DIR__ . '/pages/addPlantes.php';
        break;
    default :
        require __DIR__ . '/pages/homepage.php';
        break;
}





