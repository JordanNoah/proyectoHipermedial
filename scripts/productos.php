<?php
    session_start();
    include "../core/mysql.php";
    $db = new Db();

    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $image = $_POST["image"];
    $idUser = $_SESSION["idUser"];

    if($db->query("INSERT INTO products (idUser,nombre,descripcion,`image`) values ('$idUser','$nombre','$descripcion','$image')")){
        echo 1;
    }

?>