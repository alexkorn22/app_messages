<?php


class UserToolsModel
{
    public static function login($user){
        if($user->id)
            $_SESSION['user'] = serialize($user);
    }
    public static function logout() {
        unset($_SESSION['user']);
        session_destroy();
    }
}