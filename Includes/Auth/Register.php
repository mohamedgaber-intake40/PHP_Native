<?php
/**
 * Created by PhpStorm.
 * User: Mohamed.Gaber
 * Date: 9/1/2020
 * Time: 8:48 AM
 */

namespace Includes\Auth;


use Includes\Database\Database;

class Register
{
    private  $db ;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function register($data ,$params_typs)
    {
        $data['password'] = password_hash( $data['password'],PASSWORD_DEFAULT);
        $values = array_values($data);
        $sql = $this->prepareSql($data);
        return $this->db->insert($sql , $params_typs , $values);
    }
    private function prepareSql($data)
    {
        $keys = array_keys($data);
        $sql = 'INSERT INTO users ';
        $columns = '(';
        $values = '(';
        foreach ($keys as $idx=>$key)
        {
            if($idx == 0) {
                $columns .= $key;
                $values .= '?';
            }
            else{
                $columns .= ',' . $key ;
                $values .= ', ?' ;
            }
        }
        $columns .= ')';
        $values .= ')';
        $sql .= $columns . 'Values' . $values;
        return $sql;
    }
}