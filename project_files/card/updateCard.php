<?php

include "../server/user.php";


$id = $_POST["id"];
$front = $_POST["front"];
$back = $_POST["back"];

User::updateCard($front, $back, $id);
header("Location: ../views/practice.php?deckid=$deckid");
?>
