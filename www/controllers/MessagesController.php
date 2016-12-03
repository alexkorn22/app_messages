<?php

/**
 * class MessagesController
 * @property $limit
 */
class MessagesController extends AbstractController
{
    const COUNT_MESS_PAGE = 5;

    public function actionAll() {

        $this->limit = array(
            'size' => self::COUNT_MESS_PAGE,
        );

        $this->view->arResult = $this->GetMessages();
        MainView::display_template($this->view->render("messages"));
    }

    public function actionAllAjax() {

        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
            $start = ($page - 1) * self::COUNT_MESS_PAGE;
            $this->limit = array(
                'start' => $start,
                'size' => self::COUNT_MESS_PAGE,
            );
            $this->view->arResult = $this->GetMessages();
            $this->view->display("messages");
        }
    }

    protected function GetMessages() {
        $messages = MessagesModel::findAll(array(),$this->limit);
        foreach ($messages as $message) {
            $message->FillComments();
            $message->FillAuthor();
        }
        return $messages;
    }

}