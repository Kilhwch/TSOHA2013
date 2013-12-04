    <?php

include("../server/connection.php");

class Deck {

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
