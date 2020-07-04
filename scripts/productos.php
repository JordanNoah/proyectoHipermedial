<?php
    session_start();
    include "../core/mysql.php";
    $db = new Db();

    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $precio=$_POST["precio"];
    $image = $_POST["image"];
    $idUser = $_SESSION["idUser"];

    if($db->query("INSERT INTO products (idUser,nombre,descripcion,`image`,precio) values ('$idUser','$nombre','$descripcion','$image','$precio')")){
        echo 1;
    }

?>