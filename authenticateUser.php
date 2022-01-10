<?php

$userAuth =  $_COOKIE["userAuth"];
$isAdmin = $_COOKIE["isAdmin"];


if (!$userAuth) {
    echo '<script>
    window.location.href = "login.php";
    </script>';
}
