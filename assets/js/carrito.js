$(document).ready(function(){
    var idProducts=[];
    var idcarts=[];
    cartInfo();
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
    $(document).on("click",".removecart",function(){
        var id = $(this).attr("id");
        $.ajax({
            type:"post",
            url:"http://localhost/proyecto/scripts/removeMyCart.php",
            data:{
                "id":id
            },
            success:function(res){
                if (res==1) {
                    cartInfo()
                }
            }
        });
    });
    $(".pagar").click(function(){
        $.ajax({
            type:"post",
            url:"http://localhost/proyecto/scripts/comprado.php",
            data:{
                "idCompras":idProducts,
                "idCarrito":idcarts
            },
            success:function(res){
                cartInfo();
            }
        });
    });
});