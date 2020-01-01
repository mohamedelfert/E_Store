<?php

namespace PHPMVC\Models;

class ProductCategoriesModel extends AbstractModel
{
    public $CatId;
    public $CatName;
    public $CatImage;

    protected static $tableName = 'app_product_categories';

    protected static $tableSchema = array(
        'CatId'            => self::DATA_TYPE_INT,
        'CatName'          => self::DATA_TYPE_STR,
        'CatImage'         => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'CatId';
}