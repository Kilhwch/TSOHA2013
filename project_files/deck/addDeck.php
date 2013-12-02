<?php

include "../server/user.php";


$name = $_POST["deckname"];
$userid = $_POST["userid"];

User::addDeck($name, $userid);
header("Location: ../views/index.php");
?>