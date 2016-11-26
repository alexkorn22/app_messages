<?php

class MainController extends AbstractController
{
    public function actionIndex() {

        AbstractView::display_template($this->view->render());

    }
}