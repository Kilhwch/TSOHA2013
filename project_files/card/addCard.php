<?php
include "../server/card.php";

$front = $_POST["front"];
$back = $_POST["back"];
$deckid = $_POST['deckid'];

Card::addCard($front, $back, $deckid);
header("Location: ../views/practice.php?deckid=$deckid");
?>
