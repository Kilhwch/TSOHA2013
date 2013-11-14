<?php

include("connection.php");

class Kayttaja {

    public static function isValid($username, $password) {
        $sql = "SELECT username, password FROM login WHERE username=? AND password=?";
        $kysely = getTietokanta()->prepare($sql);
        $kysely->execute(array($username, $password));
        return $kysely->rowCount() == 1;
    }

    public static function addUser($username, $password) {
        $sql = "INSERT INTO login VALUES(?, ?)";
        $kysely = getTietokanta()->prepare($sql);
        $kysely->execute(array($username, $password));
        echo 'heh';
    }

    public static function userExists($username) {
        $sql = "SELECT username FROM login WHERE username='?'";
        $kysely = getTietokanta()->prepare($sql);
        $kysely->execute(array($username));
        return $kysely->rowCount() == 1;
    }
}

?>
