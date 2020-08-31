<?php


namespace Includes\Database;


class Database extends Connection
{
    protected function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (parent::$instance) {
            return self::$instance;
        } else {
            return self::$instance = new Database();
        }
    }

    public function insert($query , $params_types , $param_value_array )
    {
        $stmt = self::$conn->prepare($query);
        if($stmt)
        {
            $stmt->bind_param($params_types , ...$param_value_array);
            $stmt->execute();
            return self::$conn->affected_rows;
        }
        else
        {
            die('query failed');
        }
    }

    public function delete($query , $params_types , $param_value_array )
    {
        $stmt = self::$conn->prepare($query);
        if($stmt)
        {
            $stmt->bind_param($params_types , ...$param_value_array);
            $stmt->execute();
            return self::$conn->affected_rows;
        }
        else
        {
            die('query failed');
        }
    }

    public function update($query , $params_types , $param_value_array )
    {
        $stmt = self::$conn->prepare($query);
        if($stmt)
        {
            $stmt->bind_param($params_types , ...$param_value_array);
            $stmt->execute();
            return self::$conn->affected_rows;
        }
        else
        {
            die('query failed');
        }
    }

}
