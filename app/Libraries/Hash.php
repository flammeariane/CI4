<?php 

namespace App\Libraries;

class Hash {
    //creation du hash pour stocker le password en db
    public static function hash_password($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function verify_hash($entered_password, $db_password){
        if(password_verify($entered_password, $db_password)){
            return true; 
        }else{
            return false;
        }
    }
}

?>