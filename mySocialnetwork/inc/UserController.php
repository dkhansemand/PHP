<?php

class UserController {
    
    public function AddUser($userInfo)
    {
        if(!empty($userInfo) && gettype($userInfo) == 'array'){

        }else{
            echo 'User information variable need to be given and in format "array".';
        }
    }

    public function Login($username, $password)
    {
        
    }

}

