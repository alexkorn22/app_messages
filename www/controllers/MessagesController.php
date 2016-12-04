<?php

/**
 * class MessagesController
 * @property $limit
 */
class MessagesController extends AbstractController
{
    const COUNT_MESS_PAGE = 4;

    public function actionAll() {

        $this->limit = array(
            'size' => self::COUNT_MESS_PAGE,
        );

        $this->view->arResult = $this->GetMessages();
        AbstractView::display_template($this->view->renderAll());
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
            echo $this->view->renderForAjax();
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