$('#formLogin').submit(function(e){
    e.preventDefault();

    var usuario = $.trim($("#user").val());
    var password =$.trim($("#password").val());


    $.ajax({
        url:'../php/login_2.php',
        type:"POST",
        data:{user:usuario,password:password},
        beforeSend:function (){
            if(usuario.length === "" || password === ""){
                Swal.fire({
                    type:'warning',
                    title:'Debe ingresar un usuario y/o password',
                });
                return false;
            }
        }
    }).done(function (data){
        if (data === "null"){
            Swal.fire({
                type:'error',
                title:'Usuario o contraseña Invalido',
            });

        }else{
            localStorage.setItem("sessionUser",usuario);
            Swal.fire({
                type:'success',
                title:'¡Ingreso Exitoso!',
                confirmButtonColor:'#9DC9AC',
                confirmButtonText:'Ingresar'

            }).then((result) => {
                if(result.value){
                    window.location.href = "html/inicio.html";
                }
            })
        }
    });
});
