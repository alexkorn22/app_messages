<?php

class MessagesController extends AbstractController
{
    public function actionAll() {
        MainView::display_template($this->view->render("messages"));
    }

    public function actionAddPost() {

        if ($this->IsPost()) {
            $messages = new MessagesModel();
            $messages->id_author = UserModel::CurrentUserID();
            $messages ->text = $_POST['text'];
            $messages->save();
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
        die;
    }
}