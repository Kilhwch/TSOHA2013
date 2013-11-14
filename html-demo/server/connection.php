<?php

function getTietokanta() {
$dbh = new PDO('pgsql:user=kkivikat dbname=kkivikat password=3f886401d39d7339');
return $dbh;
}


?>
