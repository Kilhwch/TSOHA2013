<?php

$username = $_POST["username"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

include "../server/user.php";

if (User::userExists($username) == false && User::registerSafetyCheck($username, $password1, $password2) == true) {
    User::addUser($username, $password1);
    header("Location: ../views/index.php");
} else {
    header("Location: ../views/error.php");
}
?>