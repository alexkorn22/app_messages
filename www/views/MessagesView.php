<?php

class MessagesView extends AbstractView{

    protected $pathComponents = 'messages';

    public function renderAll(){
        $this->ajaxMode = false;
        if ($this->IsAuthUser) {
            $this->headerMessages = parent::render($this->pathComponents . '/form_add_message');
        } else {
            $this->headerMessages = parent::render($this->pathComponents . '/not_auth_form');
        }

        return parent::render($this->pathComponents . '/messages');
    }
    public function renderForAjax(){
        $this->ajaxMode = true;
        return parent::render($this->pathComponents . '/messages');
    }
}