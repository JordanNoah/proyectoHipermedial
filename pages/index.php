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
        <div class="mr-2 pages" id="carritoPages" style="position:relative;cursor:pointer;">
            <div class="notificationPay" style="display:none;"></div>
            <i class="fas fa-shopping-cart"></i>
        </div>
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
<nav class="nav">
    <a style="color:#007bff;cursor:pointer;" class="nav-link pages" id="comprasPage">Compras</a>
    <a style="color:#007bff;cursor:pointer;" class="nav-link pages" id="ventasPages">Ventas</a>
    <a style="color:black;cursor:pointer;" class="nav-link pages" id="productosPages">Tus productos</a>
    <a style="color:#007bff;cursor:pointer;" class="nav-link pages" id="tiendaPages">Tienda</a>
</nav>
<div>
    <div class="productos">
        <?php require_once "productos.php";?>
    </div>
    <div class="compra" style="display:none;">
        <?php require_once "compra.php";?>
    </div>
    <div class="venta" style="display:none;">
        <?php require_once "venta.php";?>
    </div>
    <div class="tienda" style="display:none;">
        <?php require_once "tienda.php";?>
    </div>
    <div class="carrito" style="display:none;">
        <?php require_once "carrito.php";?>
    </div>
</div>
<style>
    .notificationPay{
        width: 5px;
        background-color: green;
        height: 5px;
        border-radius: 133px;
        position: absolute;
        right: 0px;
    }
</style>
<script>
    $(document).ready(function(){
        $(".pages").click(function(){
            var page = $(this).attr("id");
            if(page=="comprasPage"){
                $(".compra").css("display","block");
                    $("#comprasPage").css("color","black");
                $(".venta").css("display","none");
                    $("#ventasPages").css("color","#007bff");
                $(".productos").css("display","none");
                    $("#productosPages").css("color","#007bff");
                $(".tienda").css("display","none");
                    $("#tiendaPages").css("color","#007bff");
                $(".carrito").css("display","none");
                    $("#carritoPages").css("color","#007bff");
            }else if(page=="ventasPages"){
                $(".compra").css("display","none");
                    $("#comprasPage").css("color","#007bff");
                $(".venta").css("display","block");
                    $("#ventasPages").css("color","black");
                $(".productos").css("display","none");
                    $("#productosPages").css("color","#007bff");
                $(".tienda").css("display","none");
                    $("#tiendaPages").css("color","#007bff");
                $(".carrito").css("display","none");
                    $("#carritoPages").css("color","#007bff");
            }else if(page=="productosPages"){
                $(".compra").css("display","none");
                    $("#comprasPage").css("color","#007bff");                        
                $(".venta").css("display","none");
                    $("#ventasPages").css("color","#007bff");                        
                $(".productos").css("display","block");
                    $("#productosPages").css("color","black");               
                $(".tienda").css("display","none");
                    $("#tiendaPages").css("color","#007bff");
                $(".carrito").css("display","none");
                    $("#carritoPages").css("color","#007bff");
            }else if(page=="tiendaPages"){
                $(".compra").css("display","none");
                    $("#comprasPage").css("color","#007bff");                        
                $(".venta").css("display","none");
                    $("#ventasPages").css("color","#007bff");                        
                $(".productos").css("display","none");
                    $("#productosPages").css("color","#007bff");
                $(".tienda").css("display","block");
                    $("#tiendaPages").css("color","black");
                $(".carrito").css("display","none");
                    $("#carritoPages").css("color","#007bff");
            }else if(page=="carritoPages"){
                $(".compra").css("display","none");
                    $("#comprasPage").css("color","#007bff");                        
                $(".venta").css("display","none");
                    $("#ventasPages").css("color","#007bff");                        
                $(".productos").css("display","none");
                    $("#productosPages").css("color","#007bff");
                $(".tienda").css("display","none");
                    $("#tiendaPages").css("color","#007bff");
                $(".carrito").css("display","block");
                    $("#carritoPages").css("color","black");   
            }
        });
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
