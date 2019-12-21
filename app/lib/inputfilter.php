<?php
namespace PHPMVC\Lib;

trait InputFilter     /* trait دي كل مهمتها ان فيها شوية functions مهمتهم يعملو filter ل input اللي جاي  */
{
    /* 3 functions دول مهمتهم ياخدو input اللي جاي ويعملوله filter سواء str , int , float وكده */

    public function filterInteger($input){
        return filter_var($input,FILTER_SANITIZE_NUMBER_INT);
    }

    public function filterString($input){
        return filter_var($input,FILTER_SANITIZE_STRING);
    }

    public function filterFloat($input){
        return filter_var($input,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    }
}