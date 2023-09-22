$('#form_agregar_productos').submit(function(e){
    e.preventDefault();
    var datos=$('#form_agregar_productos').serialize();

    $.ajax({
        url:'../php/envio.php',
        type:"POST",
        data:datos
    }).done(function (data){
        if (data === null){
            Swal.fire({
                type:'error',
                title:'El material ya se encuentra registrado',
            });

        }else{
            Swal.fire({
                type:'success',
                title:'¡Ingreso Exitoso!',
                confirmButtonColor:'#9DC9AC',
                confirmButtonText:'Ingresar'

            }).then((result) => {
                if(result.value){

                }
            })
        }
    });




});