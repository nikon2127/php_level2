<?php
error_reporting(E_ALL);
require_once __DIR__ . '/function/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);
//var_dump($_SERVER['REQUEST_URI']);
$ctrl = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'News';
$act = !empty($pathParts[3]) ? ucfirst($pathParts[3]) : 'All';
if(!empty($pathParts[4])){
    $_GET['id'] = (int) $pathParts[4];
}

//$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
//$act = isset($_GET['act']) ? $_GET['act'] : 'All';
//var_dump($_SERVER['REQUEST_URI']);
try{
    $controllerClassName = $ctrl . 'Controller';
    $controller = new $controllerClassName;
    $method = 'action' . $act;
    $controller->$method();
}catch (E404Ecxeption $e){
    $view = new View();
    $view->error = $e->getMessage();
    $view->display('404.php');
}

