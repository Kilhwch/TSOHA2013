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
}

?>
