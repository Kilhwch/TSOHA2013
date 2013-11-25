<?php

include "../server/user.php";

$front = $_POST["front"];
$back = $_POST["back"];
User::addCard($front, $back);
header("Location: ../views/index.php");
?>
