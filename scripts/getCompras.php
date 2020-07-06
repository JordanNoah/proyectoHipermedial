<?php
    session_start();
    include "../core/mysql.php";
    $db = new Db();

    $idUser = $_SESSION["idUser"];

    $compras = $db->select("SELECT * from compra inner join products on products.idproducts = compra.idProducto where compra.idUser = $idUser");
    if (count($compras)>0) {
        echo json_encode($compras);
    }
?>