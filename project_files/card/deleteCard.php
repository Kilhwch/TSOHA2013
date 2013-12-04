<?php

include "../server/card.php";

$id = $_POST["id"];
$deckid = $_POST["deckid"];

Card::deleteCard($id);
header("Location: ../views/practice.php?deckid=$deckid");
?>
