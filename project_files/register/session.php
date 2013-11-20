<?php

session_start();

function isLogged() {
    if (!isset($_SESSION["username"])) {
        header("Location: ../login/login.php");
    }
}

?>