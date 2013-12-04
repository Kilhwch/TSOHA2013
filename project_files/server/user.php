<?php

include("../server/connection.php");

class User {
    /* Useriin liittyvät handlerit */

    public static function getValidUserId($username, $password) {
        $sql = "SELECT id FROM login WHERE username=? AND password=?";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($username, $password));
        return $kysely->fetchColumn();
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
        if ($kysely->rowCount() >= 1) {
            return true;
        }
        else
            return false;
    }

    public static function registerSafetyCheck($username, $password1, $password2) {
        if ($password1 != $password2) {
            return false;
        } else if (strlen($password1) < 6 || strlen($password1) > 25) {
            return false;
        } else if (!preg_match("#[0-9]+#", $password1)) {
            return false;
        } else if (strlen($username) < 3 || strlen($username) > 10) {
            return false;
        } else {
            return true;
        }
    }
}
?>
