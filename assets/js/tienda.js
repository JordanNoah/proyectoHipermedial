$(document).ready(function(){
    callproducts();
    cartInfo();
    function callproducts(){
        $(".listProductsTienda").empty();
        $.ajax({
            type:"get",
            url:"http://localhost/proyecto/scripts/getallProducts.php",
            success:function(res){
                var products = JSON.parse(res);
                products.forEach(element => {
                    var image = new Image();                
                    image.src = element["image"]
                    $(".listProductsTienda").append(
                        "<div class='col-4'>"+
                            "<img class='imgproducts' src='"+element["image"]+"' />"+
                            "<div class='d-flex justify-content-center'>"+
                                "<h5>"+element["nombre"]+"</h5>"+
                            "</div>"+
                            "<div class='d-flex justify-content-center'>"+
                                "<h6>"+element["descripcion"]+"</h6>"+
                            "</div>"+
                            "<div>"+
                            "</div>"+
                            "<div>"+
                            "<button type='button' style='width: 100%;' class='btn btn-success buyThis' id='"+element["idproducts"]+"'>Comprar</button>"+
                            "</div>"+
                        "</div>"
                    );
                });
            }
        });
    }
    $(document).on('click','.buyThis',function(){
        var idProduc = $(this).attr("id");
        $.ajax({
            type:"post",
            url:"http://localhost/proyecto/scripts/saveCart.php",
            data:{
                "idProduc":idProduc
            },
            success:function(res){
                if (res==1) {
                    cartInfo();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Añadido al carrito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
    });
    function cartInfo(){
        $.ajax({
            type:"get",
            url:"http://localhost/proyecto/scripts/getMyProducts.php",
            success:function(res){
                if(res==0){
                    $(".notificationPay").css("display","none");
                }else{
                    $(".notificationPay").css("display","block");
                }
            }
        });
    }
});