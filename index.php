<?php

use Includes\Validator\Rules\Required;

require_once 'Includes/bootstrap.php';
$db = \Includes\Database\Database::getInstance();
$res= \Includes\Validator\Validator::validate('1' , "number|required");
$errors [] = ['name'=>$res];
var_dump($errors);


