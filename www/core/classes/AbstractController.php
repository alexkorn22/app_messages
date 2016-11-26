<?php

abstract class AbstractController
{
    public $view;

    public function __construct()
    {
        $nameClass = str_replace('Controller','',get_called_class());
        $viewClassName = $nameClass . 'View';
        if (file_exists(__DIR__ . '/../../views/' . $nameClass . 'View.php'))
            $this->view = new $viewClassName();
        else
            $this->view = new MainView();
    }

    public function IsGet() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }
    public function IsPost() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    public function action404() {
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
    }
}