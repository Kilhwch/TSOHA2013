<?php
include("../server/connection.php");

class Card {
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
}
?>