<?php
    include "../includes/header.php";
    session_start();
    if(!isset($_SESSION["idUser"])){
        echo '<script>window.location.href = "http://localhost/proyecto/pages/login.php";</script>';
    }
?>