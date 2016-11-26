<?php

/**
 * class NewsModel
 * @property $id
 * @property $text
 * @property $date
 * @property $id_author
 */
class MessagesModel extends AbstractModel
{
    protected static $table = 'messages';

    public function __construct(){
        $this->date = time();
    }

}