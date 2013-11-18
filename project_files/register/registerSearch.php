<?php

$username = $_POST["username"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

include "../server/user.php";

if (user::userExists($username) == false) {
    if (user::loginSafetyCheck($username, $password1, $password2) == true) {
        var_dump($username);
        var_dump($password1);
        user::addUser($username, $password1);
        header('Location: index.php');
    }
} else {
    header('Location: error.php');
}
?>
