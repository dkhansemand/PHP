<?php

namespace Database;
use \PDO;
use \Log;

class DB extends \PDO implements \Log\Log{

    private $conn;

    public function logError($errCode, $errLogBy, $errMsg){
        $timestamp = date("d-m-Y H:i:s");
        $date = date("d-m-y");
        $fullPath = _LOG_PATH_ . 'error_'.$date.'.log';
       // print_r(self::getLogPath());
        $logEntry = '[' . $timestamp . '][' . $errCode . '][' . $errLogBy . '] - ' . $errMsg . PHP_EOL;
        if(file_exists($fullPath)){
            ## Log for the current date exsist, add new log entry.
            file_put_contents($fullPath, $logEntry, FILE_APPEND) or die("Not able to write logentry to file");
        }else{
            ## Log for the current date does not exsist, create it first. Then add new log entry
            if(fopen($fullPath, 'w')){
                file_put_contents($fullPath, $logEntry, FILE_APPEND) or die("Not able to write logentry to file");
            }else{
                echo 'Not able to create file // ' . $fullPath . 'error_'.$date.'.log';
            } 
        }
    }

    public function __construct($host, $username, $password, $db){
        try{
            $pdoOptions = array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            );
            $this->conn = parent::__construct("mysql:host=$host;dbname=$db;charset=utf8", $username, $password, $pdoOptions);
            //return $this->conn;
        }catch(\PDOException $err){
            self::logError($err->getCode(), 'System\PDO', $err->getMessage());
            echo 'Error logged!';
            exit;
        }finally{
            unset($conn);
        }

    }

    public function prepQuery($query){
        return $this->prepare($query);
    }

    public function getValue(){
        return $this->value;
    }
}
