<?php
/*Настройки подключения для БД*/
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'app_messages');

/*Общие настройки*/
define('PATH_FILE_TEMPLATES', $_SERVER['DOCUMENT_ROOT'] . '/templates');

/*Константы для авторизации ВК*/
define('VK_CLIENT_ID'       , '5756643');// ID приложения
define('VK_CLIENT_SECRET'   , 'C51j7uSR9zm2pPNJ2cMl'); // Защищённый ключ
define('VK_REDIRECT_URI'    , 'http://' . $_SERVER['HTTP_HOST'] . '/authorization/authvk/'); //url для перенаправления
define('VK_AUTH_URL'    , 'https://oauth.vk.com/authorize'); // url  для получения токена

/*Константы для авторизации Facebook*/
define('FB_CLIENT_ID'       , '583457091838521');// ID приложения
define('FB_CLIENT_SECRET'   , '49bb5ef0fc045b7e87a978f10c7f2231'); // Защищённый ключ
define('FB_REDIRECT_URI'    , 'http://' . $_SERVER['HTTP_HOST'] . '/authorization/authfb/'); //url для перенаправления
define('FB_AUTH_URL'    , 'https://graph.facebook.com/oauth/access_token'); // url для авторизации