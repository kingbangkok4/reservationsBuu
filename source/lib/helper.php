<?php

function requireLogin() {
    if (empty($_SESSION["logedIn"])) {
        header("location: page1.php");
    }
}

function redirect($url) {
    header("location:$url");
}
?>