<?php

$kayttaja = $_POST["username"];
$salasana = $_POST["password"];

include "kayttaja.php";
$varmennus = new Kayttaja($kayttaja, $salasana);
if ($varmennus->isValid()==true) {
  header('Location: index.php');
}

else {
   header('Location: error.php');
}



?>
