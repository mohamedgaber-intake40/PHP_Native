<?php


namespace Includes\Validator\Rules;


interface Rule
{
    public static  function validate($value ,$table = null , $key = null);
}
