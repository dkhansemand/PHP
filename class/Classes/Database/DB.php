<?php

namespace Database;
use \PDO;
use \Log;

class DB extends \PDO implements \Log\Log{

    private $conn;
    private $logPath;

    public function setLogPath($dir){
        $this->logPath = $dir;
    }

    public function getLogPath(){
        return $this->logPath;
    }

    public function __construct($host, $username, $password, $db){
        $this->setLogPath(__DIR__);
        
        try{
            $pdoOptions = array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            );
            $this->conn = parent::__construct("mysql:host=$host;dbname=$db;charset=utf8", $username, $password, $pdoOptions);
            //return $this->conn;
        }catch(\PDOException $err){
            echo '[PDO][ERROR]: ' . $err->getMessage();
            exit;
        }finally{
            unset($conn);
        }

    }

    public function prepQuery($query){
        $prepare = $this->prepare($query);
        return $prepare;
    }

    public function getValue(){
        return $this->value;
    }
}
