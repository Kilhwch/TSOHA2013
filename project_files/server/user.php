<?php

include("connection.php");

class User {

    public static function isValid($username, $password) {
        $sql = "SELECT username, password FROM login WHERE username=? AND password=?";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($username, $password));
        return $kysely->rowCount() == 1;
    }

    public static function addUser($username, $password) {
        $sql = "INSERT INTO login VALUES(?, ?)";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($username, $password));
    }

    public static function userExists($username) {
        $sql = "SELECT username FROM login WHERE username='?'";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($username));
        return $kysely->rowCount() == 1;
    }

    public static function loginSafetyCheck($username, $password1, $password2) {
        var_dump($password1);
        var_dump(strlen($password1));
        exit;
        if ($password1 != $password2) {
            return false;
        }

        
        else if (strlen($password1) < 6 || strlen($password1) > 25) {
            return false;
        }
        
        else if (!preg_match("#[0-9]+#", $password1)) {
            return false;
        }

        else if (strlen($username) < 3 || strlen($username) > 10) {
            return false;
        } else {
            return true;
            
        }
    }

}

?>
