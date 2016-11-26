<?php

abstract class AbstractView
{
    protected $data = array();
    private $dir_tmpl = PATH_FILE_TEMPLATES;

    public function __set($key, $value){
        $this->data[$key] = $value;
    }
    public function __get($key){
        return $this->data[$key];
    }

    public function render($template){
        foreach ($this->data as $key => $value){
            $$key = $value;
        }
        ob_start();
        include($this->dir_tmpl . '/' . $template. '.php');
        return ob_get_clean();
    }

    public function display($template){

        echo $this->render($template);

    }

}