<?php
    session_start();
    session_unset();
    session_destroy();
    if(!isset($_SESSION["idUser"])){
        echo '<script>window.location.href = "http://localhost/proyecto/pages/login.php";</script>';
    }
?>