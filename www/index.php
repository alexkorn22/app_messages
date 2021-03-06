<?php
require_once __DIR__.'/core/functions.php';
require_once __DIR__.'/core/autoload.php';
require_once __DIR__.'/core/config.php';

define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('WEB_ROOT', $_SERVER['HTTP_HOST']);


$arMainPath = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
if (!empty($arMainPath) && count($arMainPath)>=2){

    $ctrl = $arMainPath[0];
    $act = $arMainPath[1];

}else {

    $ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Main';
    $act = isset($_GET['act']) ? $_GET['act'] : 'Index';

}
$controllerClassName = $ctrl.'Controller';
$method = 'action'.$act;
if (class_exists($controllerClassName)) {
    $controller = new $controllerClassName();
    if (method_exists($controller, $method)) {
        $controller->$method();
    }else {
        $controller->action404();
    }
} else {
    $controller = new MainController();
    $controller->action404();
}






