/*=============================================
EDITAR USUARIO
=============================================*/
$(document).on("click", ".btnEditarTecnico", function(){


  var idTecnico = $(this).attr("idTecnico");

  var datos = new FormData();
  datos.append("idTecnico", idTecnico);

  $.ajax({

      url:"ajax/tecnicouser.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){

        $("#editarNombre").val(respuesta["tec_nombre"]);
        $("#editarApellido").val(respuesta["tec_apellido"]);
        $("#editarTelefono").val(respuesta["tec_telefono"]);
        $("#editarUsuario").val(respuesta["tec_user"]);
        $("#editarRol").html(respuesta["tec_rol"]);
        $("#editarRol").val(respuesta["tec_rol"]);
        
        $("#passwordActual").val(respuesta["tec_pass"]);


      }

  })

})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarTecnico", function(){

    var idTecnico = $(this).attr("idTecnico");


    swal({

        title: '¿Está seguro de borrar este tecnico?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar tecnico!',

    }).then((result)=>{

        if(result.value){

          window.location = "index.php?ruta=tecnico&idTecnico="+idTecnico;
        }

    });

})

/*=============================================
    REVISAR USUARIOS YA REGISTRADOS
=============================================*/
$("#nuevoUsuario").change(function(){

    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url:"ajax/tecnicouser.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

         if(respuesta){

            $("#nuevoUsuario").parent().after('<div class="alert alert-danger">Este usuario ya existe en la base de datos</div>');

            $("#nuevoUsuario").val("");

         }

        }


    });

})

