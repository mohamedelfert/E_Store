<?php

namespace PHPMVC\Models;

class ProductListModel extends AbstractModel
{
    public $ProductId;
    public $CatId;
    public $ProductName;
    public $ProductImage;
    public $Quantity;
    public $BuyPrice;
    public $SellPrice;
    public $Unit;
    public $BarCode;

    protected static $tableName = 'app_product_list';

    protected static $tableSchema = array(
        'ProductId'           => self::DATA_TYPE_INT,
        'CatId'               => self::DATA_TYPE_INT,
        'ProductName'         => self::DATA_TYPE_STR,
        'ProductImage'        => self::DATA_TYPE_STR,
        'Quantity'            => self::DATA_TYPE_INT,
        'BuyPrice'            => self::DATA_TYPE_DECIMAL,
        'SellPrice'           => self::DATA_TYPE_DECIMAL,
        'Unit'                => self::DATA_TYPE_INT,
        'BarCode'             => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'ProductId';

    public static function getAll()
    {
        return self::get(
            'SELECT * FROM ' . self::$tableName . ' INNER JOIN app_product_categories ON ' . self::$tableName . ' .CatId = app_product_categories.CatId'
        );
    }



}