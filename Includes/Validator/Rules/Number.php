<?php


namespace Includes\Validator\Rules;


class Number implements Rule
{

    public static function validate($value, $table = null, $key = null)
    {
        return preg_match('/[0-9]+/',$value) ? true : 'Must be Numbers only';
    }
}
