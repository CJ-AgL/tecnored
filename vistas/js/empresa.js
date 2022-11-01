/*=============================================
EDITAR EMPRESA
=============================================*/
$(document).on("click", ".btnEditarEmpresa", function(){


	var idEmpresa = $(this).attr("idEmpresa");

	var datos = new FormData();
	datos.append("idEmpresa", idEmpresa);

	$.ajax({

		url: "ajax/empresa.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){


			$("#editarEmpresa").val(respuesta["emp_nombre"]);
			$("#idEmpresa").val(respuesta["emp_id"]);
			
		}



	})

})

/*=============================================
ELIMINAR EMPRESA
=============================================*/
$(document).on("click", ".btnEliminarEmpresa", function(){

	var idEmpresa = $(this).attr("idEmpresa");


	swal({

		title: '¿Está seguro de borrar la empresa?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar empresa!',

	}).then((result)=>{

		if(result.value){

			window.location = "index.php?ruta=empresa&idEmpresa="+idEmpresa;
		}

	});

})

/*=============================================
    REVISAR EMPRESA YA REGISTRADAS
=============================================*/
$("#nuevaEmpresa").change(function(){

    $(".alert").remove();

    var empresa = $(this).val();

    var datos = new FormData();
    datos.append("validarEmpresa", empresa);

    $.ajax({
        url:"ajax/empresa.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

         if(respuesta){

            $("#nuevaEmpresa").parent().after('<div class="alert alert-danger">Esta empresa ya existe en la base de datos</div>');

            $("#nuevaEmpresa").val("");

         }

        }


    });

})