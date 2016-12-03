<?php


/**
 * class UserModel
 * @property $id
 * @property $fullName
 * @property $guid
 * @property $first_name
 * @property $last_name
 */
class UserModel extends AbstractModel
{
    protected static $table = 'users';

    public static function CurrentUserID() {
        return 1;
    }
}