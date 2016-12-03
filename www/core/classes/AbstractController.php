<?php

abstract class AbstractController
{
    public $view;
    public $user;
    public $IsAuthUser= false;
    protected $data;

    public function __construct()
    {
        $nameClass = str_replace('Controller','',get_called_class());
        $viewClassName = $nameClass . 'View';
        if (file_exists(__DIR__ . '/../../views/' . $nameClass . 'View.php'))
            $this->view = new $viewClassName();
        else
            $this->view = new MainView();
        session_start();
        if (isset($_SESSION['user'])) {
            $this->user = unserialize($_SESSION['user']);
            $this->IsAuthUser = true;
        } else {
            $this->user = new UserModel();
        }

    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function IsGet() {
        return $_SERVER['REQUEST_METHOD'] == 'GET' and !empty($_GET);
    }

    public function IsPost() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public function action404() {
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
    }
}