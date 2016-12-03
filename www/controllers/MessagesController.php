<?php

class MessagesController extends AbstractController
{
    public function actionAll() {

        $messages = MessagesModel::findAll();
        foreach ($messages as $message) {
            $message->FillComments();
            $message->FillAuthor();
        }
        $this->view->arResult = $messages;
        MainView::display_template($this->view->render("messages"));
    }

}