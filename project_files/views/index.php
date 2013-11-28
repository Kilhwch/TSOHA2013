
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
            <?php 
            $_POST["deckid"] = $deck->deckid;
            
            
            echo "<a href=/views/practice.php>$deck->name</a>"
            ?>
        <br>
        <?php endforeach; ?>

    </body>
</html>