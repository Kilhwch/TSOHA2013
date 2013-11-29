<?php

include "../server/user.php";

$id = $_POST["id"];
$deckid = $_POST["deckid"];


User::deleteCard($id, $deckid);
header("Location: ../views/index.php");
?>
