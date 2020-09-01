<?php
require_once __DIR__.'/../bootstrap.php';
use Includes\Auth\Login;
use Includes\Auth\Register;
use Includes\Validator\Validator;

session_start();
$_SESSION ['register_errors']=[];

$data = [
    'email'=>$_POST['username'],
    'password'=>$_POST['password'],
    'password_confirm'=>$_POST['password_confirm']
];
$errors = [];
$data = Validator::prepare($data);
$username_errors = Validator::validate($data['email'],'required|alpha|email|unique:users,email|max:5');
$password_errors = Validator::validate($data['password'],'required|number');
$confirm_password_errors = Validator::validate($data['password_confirm'],'required');
if($data ['password'] !== $data['password_confirm'])
    $confirm_password_errors [] = 'Password did not match.';

if(count($username_errors))
    $errors ['email'] =$username_errors;

if(count($password_errors))
    $errors ['password'] = $password_errors;

if(count($confirm_password_errors))
    $errors ['confirm_password'] = $confirm_password_errors;
if(count($errors))
{
    $_SESSION['register_errors'] = $errors;
    redirect('../../register.php');
    exit();
}

//data valid
unset($data['password_confirm']);
$register_obj = new Register();
$is_registered = $register_obj->register($data ,'ss');
if(!$is_registered)
{
    $_SESSION['errors'] = ['register' => 'sorry register failed try again later'];
    redirect('../../register.php');
    exit();
}
$login_obj =new  Login();
$login_error = $login_obj->attempt($data['email'],$data['password']);
if($login_error)
{
    $_SESSION['login_errors'] = ['login' => $login_error];
    redirect('../../login.php');
    exit();
}
redirect('../../index.php');
