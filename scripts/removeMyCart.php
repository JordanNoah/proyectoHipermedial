<?php
    session_start();
    include "../core/mysql.php";
    $db = new Db();

    $idCarrito = $_POST["id"];
    $idUser = $_SESSION["idUser"];

    if($db->query("DELETE FROM carrito where idcarrito = $idCarrito and idUser = $idUser")){
        echo 1;
    }

?>