<?php

include "../server/user.php";

$id = $_POST["id"];
$deckid = $_POST["deckid"];

User::deleteCard($id);
header("Location: ../views/practice.php?deckid=$deckid");
?>
