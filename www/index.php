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

    $ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Authorization';
    $act = isset($_GET['act']) ? $_GET['act'] : 'Auth';

}
$controllerClassName = $ctrl.'Controller';
$method = 'action'.$act;

$controller = new $controllerClassName();

if (method_exists($controller, $method))
    $controller->$method();
else
    $controller->action404();


