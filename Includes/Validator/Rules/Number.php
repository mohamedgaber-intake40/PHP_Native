<?php


namespace Includes\Validator\Rules;


class Number implements Rule
{

    public static function validate($value)
    {
//        var_dump(preg_match('/[0-9]+/',$value));
        return preg_match('/[0-9]+/',$value) ? true : 'must be numbers only';
    }
}
