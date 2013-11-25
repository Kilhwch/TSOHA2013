<?php

include("../server/connection.php");

class User {
    
    /*Useriin liittyvät handlerit*/

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
    
    /*Pakkojen ja korttien handlerit*/
    
    public static function randomCard() {
        $sql = "SELECT * FROM cards order by random()";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute();
        return $randCard = $kysely->fetchObject();
       
    }
    
    public static function addCard($front, $back) {
        $sql = "INSERT INTO cards VALUES(?, ?)";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($front, $back));
    }
    
    public static function deleteCard($id) {
        $sql = "DELETE FROM cards WHERE id = ?";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($id));
    }
    
    public static function updateCard($id) {
        return $id;
    }
}

?>
