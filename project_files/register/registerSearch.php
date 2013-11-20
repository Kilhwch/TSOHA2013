<?php

$username = $_POST["username"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

include "../server/user.php";

if (user::userExists($username) == false) {
//    if (user::loginSafetyCheck($username, $password1, $password2) == true) {
        user::addUser($username, $password1);
        header("Location: ../views/index.php");
//    }
} else {
    header("Location: ../views/error.php");
}
?>
