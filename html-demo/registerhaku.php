<?php

$username = $_POST["username"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

include "kayttaja.php";
if ($password1 == $password2) {
    if (kayttaja::userExists($username) == false) {
        kayttaja::addUser($username, $password1);
        header('Location: index.php');
    }
}

else {
    header('Location: error.php');
}
?>
