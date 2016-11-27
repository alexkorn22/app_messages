<?php

/**
 * class MessagesModel
 * @property $id
 * @property $text
 * @property $date
 * @property $id_author
 */
class MessagesModel extends AbstractModel
{
    protected static $table = 'messages';
    public $comments;

    public static function findAll($order = array()) {
        if (empty($order)) {
            $order = array(
              'date' => 'DESC'
            );
        }
        return parent::findAll($order);
    }

    public function FillComments() {
        $this->comments = CommentsModel::FindByParent($this->id, 'messages');
    }
}