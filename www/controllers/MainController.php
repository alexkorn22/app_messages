<?php

class MainController extends AbstractController
{
    public function actionIndex() {

        if ($this->IsAuthUser){
            $controller = new MessagesController();
            $controller->actionAll();
        }else {
            $controller = new AuthorizationController();
            $controller->actionAuth();
        }

    }
}