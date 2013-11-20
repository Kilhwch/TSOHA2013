<?php

$username = $_POST["username"];
$password = $_POST["password"];

include "../server/user.php";

if (user::isValid($username, $password) === true) {
    session_start();
    $_SESSION["username"] = $username;
    header("Location: ../views/index.php");
} else {
    header("Location: ../views/error.php");
}
?>
