<?php

namespace Includes\Validator\Rules;

class Required implements Rule
{

   public static function validate($value)
   {
       return isset($value) && !empty(trim($value)) ? true : ' is required.';
   }

}
