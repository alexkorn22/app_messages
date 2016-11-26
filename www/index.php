<?php
require_once __DIR__.'/core/functions.php';
require_once __DIR__.'/core/autoload.php';
require_once __DIR__.'/core/config.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Main';
$act = isset($_GET['act']) ? $_GET['act'] : 'Index';

$controllerClassName = $ctrl.'Controller';
$method = 'action'.$act;

$controller = new $controllerClassName();

if (method_exists($controller, $method))
    $controller->$method();
else
    $controller->action404();


