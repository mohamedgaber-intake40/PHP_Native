<?php


namespace Includes\Validator\Rules;


use Includes\Database\Database;

class Unique implements Rule
{
    private static $db;

    public static function validate($value , $table = null , $key = null)
    {
        if(isset($value)){
        self::$db = Database::getInstance();
        $sql = self::prepare_sql($table,$key);
        $result =self::$db->run_query($sql ,'s',[$value]);
        $count =$result[0]['users_count'];
        return $count ? 'Must be unique' : true;
        }
        return false;
    }
    private static function prepare_sql($table,$key)
    {
        $sql = 'SELECT COUNT(*) as users_count FROM # where $ = ?';
        $sql =str_replace('#',$table,$sql);
        $sql =str_replace('$',$key,$sql);
        return $sql;
    }
}
