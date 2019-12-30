<?php

namespace PHPMVC\Models;

class UsersProfilesModel extends AbstractModel
{
    public $UserId;
    public $FirstName;
    public $LastName;
    public $Address;
    public $DateOfBirth;
    public $Avatar;

    protected static $tableName = 'app_users_profiles';

    protected static $tableSchema = array(
        'UserId'           => self::DATA_TYPE_INT,
        'FirstName'        => self::DATA_TYPE_STR,
        'LastName'         => self::DATA_TYPE_STR,
        'Address'          => self::DATA_TYPE_STR,
        'DateOfBirth'      => self::DATA_TYPE_DATE,
        'Avatar'           => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'UserId';
}