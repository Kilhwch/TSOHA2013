
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
        
        

    </body>
</html>