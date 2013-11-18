<?php

$username = $_POST["username"];
$password = $_POST["password"];

include "user.php";

if (user::isValid($username, $password) === true) {
    session_start();
    session_id($username);
    header('Location: index.php');
} else {
    header('Location: error.php');
}
?>
