<?php

class UserController extends AbstractController
{

    public function actionAddMessagePost() {

        if ($this->IsPost()) {
            $messages = new MessagesModel();
            $messages->id_author = UserModel::CurrentUserID();
            $messages->date = time();
            $messages ->text = $_POST['text'];
            $messages->save();
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
        die;
    }
    public function actionAddCommentsPost() {

        if ($this->IsPost()) {
            $comments = new CommentsModel();
            $comments->id_author = UserModel::CurrentUserID();
            $comments->date = time();
            $comments ->text = $_POST['text'];
            $comments ->id_parent = $_POST['id_parent'];
            $comments ->type_parent = $_POST['type_parent'];
            $comments->save();
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
        die;
    }

}