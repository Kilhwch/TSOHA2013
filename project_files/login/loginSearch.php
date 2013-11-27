<?php

$username = $_POST["username"];
$password = $_POST["password"];

include "../server/user.php";

$id = User::getValidUserId($username, $password);
if ($id !== false) {
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["id"] = $id;
    header("Location: ../views/index.php");
} else {
    header("Location: ../views/error.php");
}
?>
