$(document).ready(function(){
    callproducts();
    function callproducts(){
        $(".listProducts").empty();
        $.ajax({
            type:"get",
            url:"http://localhost/proyecto/scripts/productosGet.php",
            success:function(res){
                var products = JSON.parse(res);
                products.forEach(element => {
                    var image = new Image();                
                    image.src = element["image"]
                    $(".listProducts").append(
                        "<div class='col-4'>"+
                            "<div style='position:absolute;right:0px;' class='pr-5 pt-4'>"+
                            "<div class='removeProduct' id='"+element["idproducts"]+"'><i style='color:red;' class='fas fa-trash'></i></div></div>"+
                            "<img class='imgproducts' src='"+element["image"]+"' />"+
                            "<div class='d-flex justify-content-center'>"+
                                "<h5>"+element["nombre"]+"</h5>"+
                            "</div>"+
                            "<div class='d-flex justify-content-center'>"+
                                "<h6>"+element["descripcion"]+"</h6>"+
                            "</div>"+
                        "</div>"
                    );
                });
            }
        });
    }

    $(document).on("click",".removeProduct",function(){
        var idProduct = $(this).attr("id");
        $.ajax({
            type:"post",
            url:"http://localhost/proyecto/scripts/removeProduct.php",
            data:{
                "idProduct":idProduct
            },
            success:function(res){
                if (res==1) {
                    callproducts();
                }
            }
        });
    });

    $(".newProduct").click(function(){
        Swal.fire({
            title: "<i>Añadir producto</i>", 
            html: '<div class="input-group mb-3">'+
            '<input type="text" class="form-control nombreProduct" placeholder="Nombre" aria-describedby="basic-addon2">'+
            '</div>'+
            '<div class="input-group mb-3">'+
            '<textarea class="form-control descripcionProduct" placeholder="Descripción" required></textarea>'+
            '</div>'+
            '<div class="input-group mb-3">'+
            '<input type="text" class="form-control precioProduct" placeholder="Precio" aria-describedby="basic-addon2">'+
            '</div>'+
            '<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>'+
            '<p><label for="file" style="cursor: pointer;">Upload Image</label></p>'+
            '<p><img id="output" width="200" /></p>'+
            '</div>',
            showCancelButton:true,
            cancelButtonText: "Cerrar",
            confirmButtonText: "Confirmar", 
        }).then(async function(confirm){
            if(confirm["isConfirmed"]){
                var nombre = $(".nombreProduct").val();
                var descripcion = $(".descripcionProduct").val();
                var precio = $(".precioProduct").val();
                var myFile = $('#file').prop('files')[0];
                var imageBase64 = await toBase64(myFile); 
                $.ajax({
                    type:"post",
                    url:"http://localhost/proyecto/scripts/productos.php",
                    data:{
                        'nombre':nombre,
                        'descripcion':descripcion,
                        'precio':precio,
                        'image':imageBase64
                    },
                    success:function(res){
                        if (res==1) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Tu producto fue guardado',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            callproducts();
                        }
                    }
                });
            }
        });
    });
});
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
const toBase64 = file => new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = error => reject(error);
});