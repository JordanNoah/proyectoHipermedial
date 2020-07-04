<?php
    include "../core/mysql.php";
    $db = new Db();

    session_start();
    $id = $_POST["idProduct"];
    $idUser = $_SESSION["idUser"]; 
    if ($db->query("DELETE FROM products WHERE idproducts = $id and idUser = $idUser")) {
        echo 1;
    }
?>