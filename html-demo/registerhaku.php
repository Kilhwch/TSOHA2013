<?php

$kayttaja = $_POST["username"];
$salasana = $_POST["password"];

include "kayttaja.php";
$varmennus = new Kayttaja($kayttaja, $salasana);
$varmennus->addUser();
?>
