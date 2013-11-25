<?php

include "../server/user.php";

$id = $_POST["id"];

User::deleteCard($id);
header("Location: ../views/index.php");
?>
