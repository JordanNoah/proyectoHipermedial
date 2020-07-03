<?php
include "../includes/header.php";
session_start();
echo json_encode($_SESSION);
if(isset($_SESSION["idUser"])){
    echo '<script>window.location.href = "http://localhost/proyecto/pages/index.php";</script>';
}
?>
<div class="sidenav">
    <div class="login-main-text">
        <h2>Proyecto<br> Hipermedial</h2>
        <p>Logeate para obtener acceso.</p>
    </div>
    <div class="end-position">
        <button class="btn btn-light createAcc">Create account</button>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <div class="form-group">
                <label>Nombre de usuario</label>
                <input type="text" class="form-control userName" placeholder="User Name">
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-black login">Login</button>
        </div>
    </div>
</div>
<script src="../assets/js/login.js"></script>
<style>
body {
    font-family: "Lato", sans-serif;
}

.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #000;
    overflow-x: hidden;
    padding-top: 20px;
}

.end-position{
    position: absolute;
    bottom: 20px;
    left: 50px;
}

.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}
</style>
<script src="../assets/js/login.js"></script>
<?php
include "../includes/footer.php";
?>