<?php
    include "../includes/header.php";
    $products = $db->select("SELECT * FROM products where idUser = $idUser");
?>
<div class="container my-4 mr-0">
  <div class="row">
    <div class="col-12 d-flex justify-content-end">
        <button type="button" class="btn btn-primary newProduct">+ Add productos</button>
    </div>
  </div>
  <div class="listProducts row">
    <?php
        if(count($products)>0){

        }else{
            echo '<h5>Sin productos</h5>';
        }
    ?>
  </div>
</div>
<script src="../assets/js/products.js"></script>
<?php
    include "../includes/footer.php";
?>
