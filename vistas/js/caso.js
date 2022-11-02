/*=============================================
EDITAR CASO
=============================================*/
$(document).on("click", ".btnEditarCaso", function(){


	var idCaso = $(this).attr("idCaso");

	var datos = new FormData();
	datos.append("idCaso", idCaso);

	$.ajax({

		url: "ajax/caso.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){


			var datosEmpresa = new FormData();
          	datosEmpresa.append("idEmpresa", respuesta["id_empresa"]);

          	var datosTecnico = new FormData();
          	datosTecnico.append("idTecnico", respuesta["id_tecnico"]);

          	$.ajax({

              url:"ajax/empresa.ajax.php",
              method: "POST",
              data: datosEmpresa,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){

                $("#editarEmpresa").val(respuesta["emp_id"]);
                $("#editarEmpresa").html(respuesta["emp_nombre"]);

                }

            })

             $.ajax({

              url:"ajax/tecnicouser.ajax.php",
              method: "POST",
              data: datosTecnico,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){

                $("#editarTecnico").val(respuesta["tec_id"]);
                $("#editarTecnico").html(respuesta["tec_nombre"]);

                }

            })

            $("#editarCodigo").val(respuesta["codigo"]);
			$("#editarDescripcions").val(respuesta["descripcion"]);
			
			
		}



	})

})

/*=============================================
ELIMINAR CASO
=============================================*/
$(document).on("click", ".btnEliminarCaso", function(){

	var idCaso = $(this).attr("idCaso");


	swal({

		title: '¿Está seguro de borrar el caso?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar caso!',

	}).then((result)=>{

		if(result.value){

			window.location = "index.php?ruta=casos&idCaso="+idCaso;
		}

	});

})



/*=============================================
IMPRIMIR FACTURA
=============================================*/
$(".tablas").on("click", ".btnImprimirInforme", function(){

    var codigoCaso = $(this).attr("codigoCaso");

    window.open("extensiones/tcpdf/pdf/informe.php?codigo="+codigoCaso, "_blank");

})

/*=============================================
    REVISAR CASO YA REGISTRADAS
=============================================*/
$("#nuevaDescripcion").change(function(){

    $(".alert").remove();

    var caso = $(this).val();

    var datos = new FormData();
    datos.append("validarCaso", caso);

    $.ajax({
        url:"ajax/caso.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

         if(respuesta){

            $("#nuevaDescripcion").parent().after('<div class="alert alert-danger">Esta caso ya existe en la base de datos</div>');

            $("#nuevaDescripcion").val("");

         }

        }


    });

})