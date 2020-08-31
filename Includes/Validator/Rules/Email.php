<?php

namespace Includes\Validator\Rules;

class Email implements Rule
{
   public static function validate($value)
   {
       return filter_var($value,FILTER_VALIDATE_EMAIL) ? true : 'Enter Valid Email';
   }

}
