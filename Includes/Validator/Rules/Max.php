<?php


namespace Includes\Validator\Rules;


class Max implements Rule
{

    public static function validate($value, $length = null, $key = null)
    {
        return strlen($value) <= $length ? true : 'Must be ' . $length . ' at maximum';
    }
}
