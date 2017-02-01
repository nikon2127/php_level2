<?php
error_reporting(E_ALL);
require_once __DIR__ . '/function/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';
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

