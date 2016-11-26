<?php

class MainController extends AbstractController
{
    public function actionIndex() {

        MainView::display_template($this->view->render("index"));

    }
}