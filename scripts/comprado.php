<?php
    session_start();
    include "../core/mysql.php";
    $db = new Db();

    $idProducts=$_POST["idCompras"];
    $idUser = $_SESSION["idUser"];
    $idCarrito = $_POST["idCarrito"];
    echo json_encode($_POST);

    foreach ($idProducts as $value) {
        $db->query("INSERT INTO compra (idUser,idProducto) values ($idUser,$value)");
    }
    foreach ($idCarrito as $value){
        $db->query("DELETE FROM carrito where idcarrito = $value and idUser = $idUser");
    }
?>