<?php
/**
 * Created by PhpStorm.
 * User: Mohamed.Gaber
 * Date: 9/1/2020
 * Time: 9:17 AM
 */

namespace Includes\Auth;


use Includes\Database\Database;

class Login
{
    private $db;
    const REDIRECT_TO = "../";
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function attempt($email , $password)
    {
         return $this->check_user_exist($email , $password);
    }

    private function check_user_exist($email , $password)
    {
        $sql = 'SELECT * FROM users WHERE ' . $this->username() . '= ?';
        $user = $this->db->run_query($sql ,'s',[$email])[0];
        if($user)
        {
            $valid =password_verify($password ,$user['password'] );
            if($valid)
            {
               $this->start_session($user);
            }
            return $this->error('Wrong password');


        }
        return $this->error('User does not exists');
    }
    private function start_session($user)
    {
        if(session_status() != PHP_SESSION_ACTIVE)
            session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $user['id'];
        $_SESSION[$this->username()] = $user[$this->username()];
        $this->redirect(self::REDIRECT_TO);
    }

    private function error($message)
    {
        return $message;
    }
    protected function username()
    {
        return 'email';
    }
    private function redirect($path)
    {
        header("location: " . $path );
    }
//    protected function redirect_to()
//    {
//        return '/home';
//    }


}