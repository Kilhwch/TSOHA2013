<?php

include "../server/user.php";


$deckid = $_GET["deckid"];
var_dump($deckid);
User::deleteDeck($deckid);
//header("Location: ../views/index.php");

?>
