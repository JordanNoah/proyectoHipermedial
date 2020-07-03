<?php
    include "../includes/header.php";
    session_start();
    echo !isset($_SESSION["idUser"]);
    if(!isset($_SESSION["idUser"])){
        echo '<script>window.location.href = "http://localhost/proyecto/pages/login.php";</script>';
    }else{
        include "../core/mysql.php";
        $db = new Db();
        $idUser = $_SESSION["idUser"];
        $user = $db->select("SELECT * FROM usuarios where id = $idUser");
?>
<div style="height:53px;">
    <nav class="navbar fixed-top navbar-light bg-light d-flex justify-content-end">
        <img src="http://localhost/proyecto/assets/images/profile.jpeg" style="height:30px;width:30px;margin-right: 10px;" class="rounded-circle">
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $user[0]["nombre"];?>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item logOut" type="button">Log out</button>
        </div>
        </div>
    </nav>
</div>
<div>
    <div class="productos">
        <?php require_once "productos.php";?>
    </div>
    <div class="compra">
        <?php require_once "compra.php";?>
    </div>
    <div class="venta">
        <?php require_once "venta.php";?>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".logOut").click(function(){
            $.ajax({
                url : 'http://localhost/proyecto/scripts/logOut.php',
                success : function(data) {              
                    window.location.href = "http://localhost/proyecto/pages/index.php";
                }
            });
        });
    });
</script>
<?php
    }
    include "../includes/footer.php";
?>
