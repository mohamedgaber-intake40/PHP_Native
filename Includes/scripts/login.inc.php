<?php
require_once __DIR__.'/../bootstrap.php';

use Includes\Auth\Login;
use Includes\Validator\Validator;

session_start();
$_SESSION ['login_errors']=[];
$data = [
    'email'=>$_POST['email'],
    'password'=>$_POST['password'],
];
$errors = [];
$data = Validator::prepare($data);
$username_errors = Validator::validate($data['email'],'required');
$password_errors = Validator::validate($data['password'],'required');

if(count($username_errors))
    $errors ['email'] =$username_errors;

if(count($password_errors))
    $errors ['password'] =$password_errors;

if(count($errors))
{
    $_SESSION['login_errors'] = $errors;
    redirect('../../login.php');
    exit();
}

$login_obj =new Login();
$login_error = $login_obj->attempt($data['email'],$data['password']);
if($login_error)
{
    $_SESSION['login_errors'] = ['login' => $login_error];
    redirect('../../login.php');
    exit();
}
redirect('../../index.php');

