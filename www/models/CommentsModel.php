<?php

/**
 * class CommentsModel
 * @property $id
 * @property $text
 * @property $date
 * @property $id_author
 * @property $id_parent
 * @property $type_parent
 */
class CommentsModel extends AbstractModel {

    protected static $table = 'comments';
    public static $arTypeParent = array('messages', 'comments');
    public $comments;
    public $author;

    public static function findAll($order = array(),$limit = array()) {
        if (empty($order)) {
            $order = array(
                'date' => 'ASC'
            );
        }
        return parent::findAll($order);
    }

    public function save()
    {
        if (!in_array($this->type_parent, static::$arTypeParent))
            $this->type_parent = static::$arTypeParent[0];
        return parent::save();
    }

    public static function FindByParent($idParent, $typeParent = 'messages') {
        $params = array(
            array(
                'column'    => 'id_parent',
                'value'     => $idParent,
            ),
            array(
                'column'    => 'type_parent',
                'value'     => $typeParent,
            ),
        );
        $order = array(
            'date' => 'ASC'
        );
        $arResult = self::findByColumns($params,$order);
        if ($arResult){
            foreach ($arResult as $item) {
                $item->FillAuthor();
                $item->comments = self::FindByParent($item->id, 'comments');
            }
            return $arResult;
        }
    }

    public function FillAuthor() {
        $author = UserModel::findOneByPk($this->id_author);
        if ($author)
            $this->author = $author;
        else
            $this->author = new UserModel();
    }

}