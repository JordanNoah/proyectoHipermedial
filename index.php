<?php

    session_start();
    if(isset($_SESSION)){
        echo '<script>window.location.href = "http://localhost/proyecto/pages/login.php";</script>';
    }else{
        echo '<script>window.location.href = "http://localhost/proyecto/pages/index.php";</script>';
    }

?>