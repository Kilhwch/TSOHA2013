<?php

$username = $_POST["username"];
$password = $_POST["password"];

include "kayttaja.php";

if (kayttaja::isValid($username, $password) === true) {
  header('Location: index.php');
}

else {
   header('Location: error.php');
}

?>
