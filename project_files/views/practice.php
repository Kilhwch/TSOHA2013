
<?php
include "../register/session.php";
isLogged();
?>


<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../style/main.css">
        <script type='text/javascript' src="../js/jquery-2.0.3.js"></script>
        <script type='text/javascript'>
            function showDiv() {
                if (document.getElementById('hiddenDiv').style.display === 'block') {
                    document.getElementById('hiddenDiv').style.display = 'none';
                } else {
                    document.getElementById('hiddenDiv').style.display = 'block';
                }
            }



            $(function() {
                $("#editToggle").click(function() {
                    $("#editForms").slideToggle();
                });
                $("#editCardToggle").click(function() {
                    $("#editCard").slideToggle();
                });
            });
        </script>
    </head>
    <body>

        <h2>Front:</h2>

        <?php
        include "../server/card.php";
        $deckid = $_GET['deckid'];
        $card = Card::randomCard($deckid);

        echo $card->front;
        ?>

        <form action="../card/updateCard.php" method="POST">
            <div id="editCard">
                <input type="hidden" name="id" value="<?php echo $card->id ?>"> 
                Front: <input type="text" name="front" value="<?php echo $card->front ?>"><br>
                Back: <input type="text" name="back" value="<?php echo $card->back ?>"><br>
                <input type="submit" value="Apply">
            </div>
        </form>


        <h2>Back:</h2>

        <div id="hiddenDiv">
            <?php echo $card->back ?>
        </div>




        <input type="button" name="answer" value="Show Answer" onclick="showDiv();"/>

        <input type="submit" id="editCardToggle" value="Edit Card">
        <form action="../card/deleteCard.php" method="POST">
            <input type="hidden" name="deckid" value="<?php echo $deckid ?>">
            <input type="hidden" name="id" value="<?php echo $card->id ?>">
            <input type="submit" value="Delete Card">
        </form> 

        <form method="POST">
            <input type="submit" value="Next">
        </form>




        <input type="submit" id="editToggle" value="Options">
        <div id="editForms">


            <form action="../card/addCard.php" method="POST">
                <input type="hidden" name="front" value="<?php echo $card->front ?>">
                <input type="hidden" name="back" value="<?php echo $card->back ?>">
                <input type="hidden" name="deckid" value="<?php echo $deckid ?>">
                Front: <input type="text" name="front"><br>
                Back : <input type="text" name="back"><br>
                <input type="submit" value="Add Card">
            </form>

            <form action="../deck/deleteDeck.php" method="POST">
                <input type="hidden" name="deckid" value="<?php echo $deckid ?>">
                <input type="submit" value="Delete Deck">
            </form>
        </div>

        <form action="../views/index.php">
            <input type="submit" value="Back">
        </form>

        <script>
            $('#editForms').hide();
            $('#editCard').hide();
            document.getElementById('hiddenDiv').style.display = 'none';
        </script>
    </body>
</html>
