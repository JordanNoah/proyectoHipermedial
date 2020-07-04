<?php
    include "../core/mysql.php";
    $db = new Db();
    
    session_start();
    $idUser = $_SESSION["idUser"];

    $carrito = $db->select("SELECT * from carrito inner join products on products.idproducts=carrito.idProducts where carrito.idUser=$idUser");
    if(count($carrito)>0){
        echo json_encode($carrito);
    }else{
        echo 0;
    }
?>