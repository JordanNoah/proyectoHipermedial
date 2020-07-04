<?php
    session_start();
    include "../core/mysql.php";
    $db = new Db();
    
    $idUser = $_SESSION["idUser"];
    $idProduct = $_POST["idProduc"];
    if($db->query("INSERT INTO carrito (idProducts,idUser) value ('$idProduct','$idUser')")){
        echo 1;
    }
?>