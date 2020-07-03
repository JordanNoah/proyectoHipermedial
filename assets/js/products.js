$(document).ready(function(){  
    $(".newProduct").click(function(){
        Swal.fire({
            title: "<i>Añadir producto</i>", 
            html: '<div class="input-group mb-3">'+
            '<input type="text" class="form-control nombreProduct" placeholder="Nombre" aria-describedby="basic-addon2">'+
            '</div>'+
            '<div class="input-group mb-3">'+
            '<textarea class="form-control descripcionProduct" placeholder="Descripción" required></textarea>'+
            '</div>'+
            '<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>'+
            '<p><label for="file" style="cursor: pointer;">Upload Image</label></p>'+
            '<p><img id="output" width="200" /></p>'+
            '</div>',
            showCancelButton:true,
            cancelButtonText: "Cerrar",
            confirmButtonText: "Confirmar", 
        }).then(async function(confirm){
            if(confirm){
                var nombre = $(".nombreProduct").val();
                var descripcion = $(".descripcionProduct").val();
                var myFile = $('#file').prop('files')[0];
                var imageBase64 = await toBase64(myFile); 
                $.ajax({
                    type:"post",
                    url:"http://localhost/proyecto/scripts/productos.php",
                    data:{
                        'nombre':nombre,
                        'descripcion':descripcion,
                        'image':imageBase64
                    },
                    success:function(res){
                        console.log(res);
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