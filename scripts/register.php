<?php
    include "../core/mysql.php";
    $db = new Db();

    $name = $_POST["userNamer"];
    $password = sha1($_POST["password"]);

    $id = $db->select("SELECT id from usuarios order by id desc limit 1");

    if($db->query("INSERT INTO usuarios (nombre,`password`) value ('$name','$password')")){
        session_start();
        $_SESSION["idUser"] = $id[0]["id"] +1;
        echo 1;
    }else{
        echo 2;
    }
?>