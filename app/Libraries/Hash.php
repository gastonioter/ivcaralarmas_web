<?php 

namespace App\Libraries;

class Hash{

    public static function make($password){
        return password_hash($password, PASSWORD_BCRYPT);

    }

    public static function check($input_pass, $bd_pass){
        if(password_verify($input_pass,$bd_pass)){
            return true;
        }

        return false;
    }
}
?>