<?php

namespace PHPMVC\Models;

class UsersModel extends AbstractModel
{
    public $UserId;
    public $Username;
    public $Password;
    public $Email;
    public $PhoneNumber;
    public $SubscriptionDate;
    public $LastLogin;
    public $GroupId;
    public $Status;

    protected static $tableName = 'app_users';

    protected static $tableSchema = array(
        'UserId'           => self::DATA_TYPE_INT,
        'Username'         => self::DATA_TYPE_STR,
        'Password'         => self::DATA_TYPE_STR,
        'Email'            => self::DATA_TYPE_STR,
        'PhoneNumber'      => self::DATA_TYPE_STR,
        'SubscriptionDate' => self::DATA_TYPE_DATE,
        'LastLogin'        => self::DATA_TYPE_STR,
        'GroupId'          => self::DATA_TYPE_INT,
        'Status'           => self::DATA_TYPE_INT
    );

    protected static $primaryKey = 'UserId';

    public function cryptPassword($password){
        $salt = '$2a$07$yeNCSNwRpYopOhv0TrrReP$';
        $this->Password = crypt($password, $salt);
    }

    public static function getAll()
    {
        return self::get(
            'SELECT * FROM ' . self::$tableName . ' INNER JOIN app_users_groups ON ' . self::$tableName . ' .GroupId = app_users_groups.GroupId'
        );
    }

    public static function userExists($username)
    {
        return self::get('SELECT * FROM ' . self::$tableName . ' WHERE Username = "' . $username . '"');
    }
}