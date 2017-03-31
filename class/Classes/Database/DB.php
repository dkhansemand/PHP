<?php

namespace Database;

class DB extends \PDO{

    const Debug = false;
    protected $value = 'Protected value';
    private $conn;

    public function __construct($host, $username, $password, $db){
        if(self::Debug === false){
            echo 'Debug is not enabled';
        }else{
            echo 'Debug is enabled';
        }
        try{
            $pdoOptions = array(
                PDO::ATTR_TIMEOUT => 10,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $this->conn = parent::__construct("mysql:host=$host;dbname=$db;charset=utf8", $username, $password, $pdoOptions);
            return $this->conn;
        }catch(PDOException $err){
            echo '[PDO][ERROR]: ' . $err->getMessage();
            exit;
        }finally{
            unset($conn);
        }

    }

    public function getValue(){
        return $this->value;
    }
}
