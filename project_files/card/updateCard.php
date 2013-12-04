<?php

include "../server/card.php";


$id = $_POST["id"];
$front = $_POST["front"];
$back = $_POST["back"];

Card::updateCard($front, $back, $id);
header("Location: ../views/practice.php?deckid=$id");
?>
