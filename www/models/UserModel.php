<?php


/**
 * class UserModel
 * @property $id
 * @property $guid
 * @property $first_name
 * @property $last_name
 * @property $full_name
 */
class UserModel extends AbstractModel
{
    protected static $table = 'users';

    public function __construct()
    {
        $this->last_name = '';
        $this->first_name = '';
        $this->full_name = '';
        $this->guid = '';
        $this->id = 0;
    }

    public static function CurrentUserID() {
        return 1;
    }
}