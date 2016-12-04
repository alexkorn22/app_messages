<?php

class MessagesView extends AbstractView{

    protected $pathComponents = 'messages';

    public function renderAll(){
        $this->ajaxMode = false;
        $this->headerMessages = parent::render($this->pathComponents . '/form_add_message');
        return parent::render($this->pathComponents . '/messages');
    }
    public function renderForAjax(){
        $this->ajaxMode = true;
        return parent::render($this->pathComponents . '/messages');
    }
}