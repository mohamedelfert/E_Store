<?php

namespace PHPMVC\Lib;

trait Validate
{
    private $_regexPatterns = [

    ];

    public function required($value){
        return $value != '' || !empty($value);
    }

    public function equal($value, $matchAgainst){
        return $value == $matchAgainst;
    }

    public function equal_field($value, $otherFieldValue){
        return $value == $otherFieldValue;
    }

    public function less($value, $matchAgainst){
        if (is_numeric($value)){
            return $value < $matchAgainst;
        }elseif (is_string($value)){
            return mb_strlen($value) < $matchAgainst;
        }
    }

    public function greater($value, $matchAgainst){
        if (is_numeric($value)){
            return $value > $matchAgainst;
        }elseif (is_string($value)){
            return mb_strlen($value) > $matchAgainst;
        }
    }

    public function min($value, $matchAgainst){
        if (is_numeric($value)){
            return $value >= $matchAgainst;
        }elseif (is_string($value)){
            return mb_strlen($value) >= $matchAgainst;
        }
    }

    public function max($value, $matchAgainst){
        if (is_numeric($value)){
            return $value <= $matchAgainst;
        }elseif (is_string($value)){
            return mb_strlen($value) <= $matchAgainst;
        }
    }

    public function between($value, $min, $max){
        if (is_numeric($value)){
            return $value >= $min && $value <= $max;
        }elseif (is_string($value)){
            return mb_strlen($value) >= $min && mb_strlen($value) <= $max;
        }
    }

}