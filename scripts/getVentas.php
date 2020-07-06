<?php
    session_start();
    include "../core/mysql.php";
    $db = new Db();

    $idUser = $_SESSION["idUser"];

    $ventas = $db->select("SELECT * from venta inner join products on products.idproducts = venta.idProducts where venta.idUser = $idUser");
    if (count($ventas)>0) {
        echo json_encode($ventas);
    }
?>