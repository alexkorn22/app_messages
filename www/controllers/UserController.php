<?php

class UserController extends AbstractController
{

    public function actionAddMessagePost() {

        if (!$this->IsAuthUser) {
            header("Location: http://". $_SERVER['HTTP_REFERER']);
            die;
        }
        if ($this->IsPost()) {
            $this->SaveMessage($_POST);
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
        die;
    }

    public function actionAddCommentsPost() {

        if (!$this->IsAuthUser) {
            header("Location: http://". $_SERVER['HTTP_REFERER']);
            die;
        }
        if ($this->IsPost() && $this->IsAuthUser) {
            $this->SaveComment($_POST);
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die;
    }

    public function SaveMessage($data){
        $messages = new MessagesModel();
        $messages->id_author = $this->user->id;
        $messages->date = (empty($data['date']))? time() : $data['date'];
        $messages ->text = $data['text'];
        $messages->save();
    }
    public function SaveComment($data){
        $comments = new CommentsModel();
        $comments->id_author = $this->user->id;
        $comments->date = (empty($data['date']))? time() : $data['date'];
        $comments ->text = $data['text'];
        $comments ->id_parent = $data['id_parent'];
        $comments ->type_parent = $data['type_parent'];
        $comments->save();
    }



}