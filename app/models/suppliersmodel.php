<?php

namespace PHPMVC\Models;

class SuppliersModel extends AbstractModel
{
    public $SupplierId;
    public $SupplierName;
    public $SupplierPhone;
    public $SupplierEmail;
    public $SupplierAddress;

    protected static $tableName = 'app_suppliers';

    protected static $tableSchema = array(
        'SupplierId'           => self::DATA_TYPE_INT,
        'SupplierName'         => self::DATA_TYPE_STR,
        'SupplierPhone'        => self::DATA_TYPE_STR,
        'SupplierEmail'        => self::DATA_TYPE_STR,
        'SupplierAddress'      => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'SupplierId';

    public static function nameExists($name){
        return self::get('SELECT * FROM ' . self::$tableName .' WHERE SupplierName = "' . $name . '"');
    }

    public static function emailExists($email){
        return self::get('SELECT * FROM ' . self::$tableName .' WHERE SupplierEmail = "' . $email . '"');
    }

    public static function phoneExists($phone){
        return self::get('SELECT * FROM ' . self::$tableName .' WHERE SupplierPhone = "' . $phone . '"');
    }
}