
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
            <?php echo $deck->name ?>

        <?php endforeach; ?>


        <h2>Front:</h2>

        <?php
        include "../server/user.php";
        $card = User::randomCard();
        echo $card->front;
        ?>

        <h2>Back:</h2>


        <script type='text/javascript'>

            function showDiv() {
                if (document.getElementById('hiddenDiv').style.display == 'block') {
                    document.getElementById('hiddenDiv').style.display = 'none';
                } else {
                    document.getElementById('hiddenDiv').style.display = 'block';
                }
            }
        </script>
        <div id="hiddenDiv"  style="display:none;" class="answer_list" >
            <?php echo $card->back ?>
        </div>


        <input type="button" name="answer" value="Show Answer" onclick="showDiv();" />


        <form method="POST">
            <input type="submit" value="Next">
        </form>




        <form action="../card/updateCard.php" method="POST">
            <input type="submit" value="Edit Card">
            <input type="hidden" name="id" value="<?php echo $card->id ?>">
            <input type="text" name="front" value="<?php echo $card->front ?>">
            <input type="text" name="back" value="<?php echo $card->back ?>">

        </form>






        <form action="../card/deleteCard.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $card->id ?>">
            <input type="submit" value="Delete Card">
        </form>




        <form action="../card/addCard.php" method="POST">
            <input type="hidden" value="<?php echo $card->front, $card->back ?>">
            Front: <input type="text" name="front"><br>
            Back : <input type="text" name="back"><br>
            <input type="submit" value="Add Card">
        </form>

    </body>
</html>