<?php
    session_start();
    include "../core/mysql.php";
    $db = new Db();

    $idProducts=$_POST["idCompras"];
    $idUser = $_SESSION["idUser"];
    $idCarrito = $_POST["idCarrito"];

    foreach ($idProducts as $value) {
        $db->query("INSERT INTO compra (idUser,idProducto) values ($idUser,$value)");
        $iduse = $db->select("SELECT idUser from products where idproducts = $value");
        $idVendedor =$iduse[0]['idUser'];
        $db->query("INSERT INTO venta (idUser,idProducts) values ($idVendedor,$value)");
    }
    foreach ($idCarrito as $value){
        $db->query("DELETE FROM carrito where idcarrito = $value and idUser = $idUser");
    }
?>