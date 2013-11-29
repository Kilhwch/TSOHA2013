
<?php
include "../register/session.php";
isLogged();
?>



<html>
    <body>

        <h3>Decks:</h3>

        <?php
        include "../server/user.php";
        $decks = User::getDecks($_SESSION["id"]);

        foreach ($decks as $deck):
            ?>

            <?php echo "<a href=\"/views/practice.php?deckid={$deck->deckid}\">$deck->name</a>"
            ?>
            <br>
        <?php endforeach; ?>

        

        <form action="../deck/addDeck.php" method="POST">
            <input type="submit" value="Add Deck">
            <input type="hidden" name="userid" value="<?php echo $_SESSION["id"] ?>">
            <input type="button" onclick="newDeck()" value="Add Deck">
        </form>

    </body>
</html>