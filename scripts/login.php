<?php
    include "../core/mysql.php";
    $user=$_POST["userNamer"];
    $password=sha1($_POST["password"]);

    $db = new Db();

    $check1=$db->select("SELECT * FROM usuarios where nombre = '$user'");
    if(count($check1)>0){
        $check2=$db->select("SELECT * FROM usuarios where nombre = '$user' and `password` = '$password'");
        if(count($check2)>0){
            session_start();
            $_SESSION["idUser"]=$check2[0]["id"];
            echo "1";
        }else{
            echo "0";
        }
    }else{
        echo "2";
    }
?>