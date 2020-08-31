<?php


namespace Includes\Validator;


class Validator
{
     public static function validate( $input , $rules)
     {
         $errors = [];
         $rules = explode('|',$rules);

         foreach ($rules as  $rule)
         {
             $valid_result = self::checkRules($input , $rule );
             if($valid_result !== true)
                 $errors[] = $valid_result;
         }
         return $errors;
     }

     private static function checkRules( $input , $rule )
     {
         $rule_class= 'Includes\Validator\Rules\\'. $rule;
         return $rule_class::validate($input) ;
     }
}
