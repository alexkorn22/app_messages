<?php
function __autoload($classname) {
    if (file_exists(__DIR__.'/../controllers/'.$classname.'.php')){
        require_once __DIR__.'/../controllers/'.$classname.'.php';
    }
    elseif (file_exists(__DIR__.'/../models/'.$classname.'.php')){
        require_once __DIR__.'/../models/'.$classname.'.php';
    }
    elseif (file_exists(__DIR__.'/classes/'.$classname.'.php')){
        require_once __DIR__.'/classes/'.$classname.'.php';
    }
    elseif (file_exists(__DIR__.'/../views/'.$classname.'.php')){
        require_once __DIR__.'/../views/'.$classname.'.php';
    }
}