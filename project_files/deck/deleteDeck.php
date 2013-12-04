<?php

include "../server/deck.php";

$deckid = $_POST["deckid"];
Deck::deleteDeck($deckid);
header("Location: ../views/index.php");
?>
