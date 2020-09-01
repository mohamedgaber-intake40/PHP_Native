<?php

namespace Includes\Validator\Rules;

class Email implements Rule
{
   public static function validate($value, $table = null, $key = null)
   {
       return filter_var($value,FILTER_VALIDATE_EMAIL) ? true : 'Enter Valid Email';
   }

}
