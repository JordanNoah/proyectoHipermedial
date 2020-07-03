<?php
    include "../includes/header.php";
    session_start();
    if(isset($_SESSION["idUser"])){
        echo '<script>window.location.href = "http://localhost/proyecto/pages/index.php";</script>';
    }
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p class="font-weight-bolder">Register</p>
        </div>
        <div class="col-sm-7">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control user" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-sm-7">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="password" class="form-control password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <button type="button" class="btn btn-secondary register">Register</button>
    </div>
</div>
<script src="../assets/js/register.js"></script>
<?php
    include "../includes/footer.php";
?>