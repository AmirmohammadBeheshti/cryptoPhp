<?php

$userAuth =  $_COOKIE["userAuth"];
if(!$userAuth){
    echo '<script>
    alert("لطفا ابتدا وارد شوید");
    window.location.href = "login.php";
    </script>';
}