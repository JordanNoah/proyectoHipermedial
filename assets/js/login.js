$(document).ready(function(){
    $(".login").click(function(){
        var userNamer = $(".userName").val();
        var password = $(".password").val();
        $.ajax({
            type:"post",
            url:"http://localhost/proyecto/scripts/login.php",
            data:{
                'userNamer':userNamer,
                'password':password
            },
            success:function(res){
                if(res=="1"){window.location.assign("http://localhost/proyecto/pages/index.php");}
                if(res=="0"){alert("Contraseña Erronea");}
                if(res=="2"){alert("Usuario Erroneo");}
            }
        });
    });
    $(".createAcc").click(function(){
        window.location.href = "http://localhost/proyecto/pages/register.php";
    });
});