
<?php
include "../register/session.php";
isLogged();
?>



<html>
    <link rel="stylesheet" type="text/css" href="../style/main.css">
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



        <form action="../deck/addDeck.php" id="addDeck" method="POST">
            <input type="hidden" name="userid" value="<?php echo $_SESSION["id"] ?>">
            <input type="hidden" name="deckname" id="deckName">
            <input type="submit" onclick="getDeckName();" value="Add Deck">
        </form>

        <script>
                function getDeckName() {
                    var deckname = prompt("Deck Name");
                    if (deckname) {
                        document.getElementById("deckName").value = deckname;
                        document.getElementById("addDeck").submit();
                    }
                }
        </script>

    </body>
</html>