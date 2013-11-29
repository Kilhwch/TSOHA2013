<?php

include "../server/user.php";




$front = $_POST["front"];
$back = $_POST["back"];
$deckid = $_POST['deckid'];

User::addCard($front, $back, $deckid);
header("Location: ../views/practice.php?deckid=$deckid");
?>
