<?php

namespace PHPMVC\Lib;

trait Validate
{
    private $_regexPatterns = [
        'num'         => '/^[0-9]+(?:\.[0-9]+)?$/',
        'int'         => '/^[0-9]+$/',
        'float'       => '/^[0-9]+\.[0-9]+$/',
        'alpha'       => '/^[a-zA-Z\p{Arabic}]+$/u',
        'alpha_num'   => '/^[a-zA-Z\p{Arabic}0-9]+$/u',
        'v_date'      => '/^[1-2][0-9][0-9][0-9]-(?:(?:0[1-9])|(?:1[0-2]))-(?:(?:0[1-9])|(?:(?:1|2)[0-9])|(?:3[0-1]))$/',
        'email'       => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'url'         => '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
    ];

    public function num($value){
        return (bool) preg_match($this->_regexPatterns['num'], $value);
    }

    public function int($value){
        return (bool) preg_match($this->_regexPatterns['int'], $value);
    }

    public function float($value){
        return (bool) preg_match($this->_regexPatterns['float'], $value);
    }

    public function floatLike($value, $before, $after){
        if (!$this->float($value)){
            return false;
        }
        $pattern = '/^[0-9]{'. $before . '}\.[0-9]{' . $after . '}$/';
        return (bool) preg_match($pattern, $value);
    }

    public function alpha($value){
        return (bool) preg_match($this->_regexPatterns['alpha'], $value);
    }

    public function alpha_num($value){
        return (bool) preg_match($this->_regexPatterns['alpha_num'], $value);
    }

    public function v_date($value){
        return (bool) preg_match($this->_regexPatterns['v_date'], $value);
    }

    public function email($value){
        return (bool) preg_match($this->_regexPatterns['email'], $value);
    }

    public function url($value){
        return (bool) preg_match($this->_regexPatterns['url'], $value);
    }

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

    public function isValid($roles, $inputType){
        $errors = [];
        if (!empty($roles)){
            foreach ($roles as $filedName => $validationRoles){
                $value = $inputType[$filedName];
                $validationRoles = explode('|', $validationRoles);
                foreach ($validationRoles as $validationRole){
                    if (preg_match_all('/min\((\d+)\)/', $validationRole,$matches)){
                        echo '<pre>';
//                        var_dump($filedName,$value,$this->min($value,$matches[1][0]));
                        var_dump($matches);
                        echo '</pre>';
                    }
                }
            }
        }
        return empty($errors) ? true : false;
    }
}