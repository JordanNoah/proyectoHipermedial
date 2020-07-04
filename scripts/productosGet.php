<?php
    include "../core/mysql.php";
    $db = new Db();
    session_start();
    $idUser = $_SESSION["idUser"];
    $products = $db->select("SELECT * FROM products where idUser = $idUser");
    if(count($products)>0){
        echo json_encode($products);
    }else{
        echo 0;
    }
?>