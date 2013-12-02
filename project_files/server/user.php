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
        return $kysely->rowCount() == 1;
    }

    public static function loginSafetyCheck($username, $password1, $password2) {
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

    /* korttien handlerit */

    public static function randomCard($deckid) {
        $sql = "SELECT * FROM cards WHERE deckid = ? order by random()";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($deckid));
        return $kysely->fetchObject();
    }

    public static function addCard($front, $back, $deckid) {
        $sql = "INSERT INTO cards VALUES(?, ?, ?)";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($front, $back, $deckid));
    }

    public static function deleteCard($id) {
        $sql = "DELETE FROM cards WHERE id = ?";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($id));
    }

    public static function updateCard($front, $back, $id) {
        $sql = "UPDATE cards SET front = ?, back = ?
              WHERE id = ?";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($front, $back, $id));
    }

    /* pakkojen handlerit */
    
    
    public static function getDecks($id) {
        $sql = "SELECT * FROM decks WHERE userid = ?";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($id));
        return $kysely->fetchAll(PDO::FETCH_OBJ);
    }

    public static function addDeck($name, $userid) {
        $sql = "INSERT INTO decks (name, userid) VALUES(?, ?)";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($name, $userid));
    }

    public static function deleteDeck($deckid) {
        $sql = "DELETE FROM decks WHERE deckid = ?";
        $kysely = getDatabase()->prepare($sql);
        $kysely->execute(array($deckid));
    }

}

?>
