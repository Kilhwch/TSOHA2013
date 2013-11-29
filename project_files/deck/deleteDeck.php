<?php

include "../server/user.php";


$deckid = $_POST["deckid"];

User::deleteDeck($deckid);
header("Location: ../views/index.php");

?>
