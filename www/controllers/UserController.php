<?php

class UserController extends AbstractController
{

    public function actionAddMessagePost() {

        if ($this->IsPost()) {
            $this->SaveMessage($_POST);
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
        die;
    }

    public function SaveMessage($data){
        $messages = new MessagesModel();
        $messages->id_author = UserModel::CurrentUserID();
        $messages->date = (empty($data['date']))? time() : $data['date'];
        $messages ->text = $data['text'];
        $messages->save();
    }
    public function SaveComment($data){
        $comments = new CommentsModel();
        $comments->id_author = UserModel::CurrentUserID();
        $comments->date = (empty($data['date']))? time() : $data['date'];
        $comments ->text = $data['text'];
        $comments ->id_parent = $data['id_parent'];
        $comments ->type_parent = $data['type_parent'];
        $comments->save();
    }

    public function actionAddCommentsPost() {

        if ($this->IsPost()) {
            $this->SaveComment($_POST);
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die;
    }

}