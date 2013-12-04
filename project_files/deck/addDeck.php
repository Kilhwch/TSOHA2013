<?php

include "../server/deck.php";


$name = $_POST["deckname"];
$userid = $_POST["userid"];

Deck::addDeck($name, $userid);
header("Location: ../views/index.php");
?>