<?php

namespace PHPMVC\Models;

class ClientsModel extends AbstractModel
{
    public $ClientId;
    public $ClientName;
    public $ClientPhone;
    public $ClientEmail;
    public $ClientAddress;

    protected static $tableName = 'app_clients';

    protected static $tableSchema = array(
        'ClientId'           => self::DATA_TYPE_INT,
        'ClientName'         => self::DATA_TYPE_STR,
        'ClientPhone'        => self::DATA_TYPE_STR,
        'ClientEmail'        => self::DATA_TYPE_STR,
        'ClientAddress'      => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'ClientId';

    public static function nameExists($name){
        return self::get('SELECT * FROM ' . self::$tableName .' WHERE ClientName = "' . $name . '"');
    }

    public static function emailExists($email){
        return self::get('SELECT * FROM ' . self::$tableName .' WHERE ClientEmail = "' . $email . '"');
    }

    public static function phoneExists($phone){
        return self::get('SELECT * FROM ' . self::$tableName .' WHERE ClientPhone = "' . $phone . '"');
    }
}