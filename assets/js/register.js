$(document).ready(function(){
    $(".register").click(function(){
        var user = $(".user").val();
        var password = $(".password").val();
        if(user.length!=0 && password.length!=0){
            $.ajax({
                type:"post",
                url:"http://localhost/proyecto/scripts/register.php",
                data:{
                    'userNamer':user,
                    'password':password
                },
                success:function(res){
                    if(res=="1"){window.location.assign("http://localhost/proyecto/pages/index.php");}
                    if(res=="2"){alert("Error");}
                }
            });
        }
    });
});