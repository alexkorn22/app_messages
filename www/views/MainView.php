<?php

class MainView extends AbstractView
{
    public static function display_template($content){

        include(PATH_FILE_TEMPLATES . '/template.php');

    }
}