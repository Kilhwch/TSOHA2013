<?php

$kayttaja = $_POST["username"];
$salasana = $_POST["password"];

require("kayttaja.php");
if (getKayttaja($username, $password) != null) {
   header('Location: index.php');
}

else {
   header('Location: error.php');
}

?>
