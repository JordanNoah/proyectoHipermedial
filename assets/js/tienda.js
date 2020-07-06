$(document).ready(function(){
    callproducts();
    
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
        $(".bodyCarrito").empty();
        $.ajax({
            type:"get",
            url:"http://localhost/proyecto/scripts/getMyProducts.php",
            success:function(res){
                if(res==0){
                    $(".notificationPay").css("display","none");
                    $(".totalCant").empty().append("$ 0.00");
                }else{
                    $(".notificationPay").css("display","block");
                    var data = JSON.parse(res);
                    var total = 0.00;
                    data.forEach(element => {
                        $(".bodyCarrito").append('<a href="#" class="list-group-item list-group-item-action">'+
                        '<div class="d-flex w-100 justify-content-between">'+
                            "<img style='width:10%;height:80px;' src='"+element["image"]+"' />"+
                            '<h5 class="mb-1">'+element["nombre"]+'</h5>'+
                            '<small class="removecart" id="'+element["idcarrito"]+'"><i class="far fa-times-circle"></i></small>'+
                        '</div>'+
                        '<p class="mb-1">'+element["descripcion"]+'</p>'+
                        '<p class="mb-1">$ '+element["precio"]+'</p>'+
                        '</a>');
                        total = total + parseFloat(element["precio"]);
                        idProducts.push(element["idProducts"]);
                        idcarts.push(element["idcarrito"]);
                    });
                    $(".totalCant").empty().append("$ "+total);
                }
            }
        });
    }
});
var loadFile = function(event) {
	var image = document.getElementById('outputCart');
	image.src = URL.createObjectURL(event.target.files[0]);
};