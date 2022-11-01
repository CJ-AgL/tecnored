<?php 

class ControladorCasos{


/*=========================================
           MOSTRAR CASOS
  ===========================================*/

  static public function ctrMostrarCasos($item, $valor){

    $tabla = "caso";

    $respuesta = ModeloCasos::mdlMostrarCasos($tabla, $item, $valor);

    return $respuesta;

  }
    /*=========================================
           CREAR CASO
  ===========================================*/

    static public function ctrCrearCaso(){

        if(isset($_POST["nuevaDescripcion"])){

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])){

                $tabla = "caso";
				
                $datos = array("descripcion" => $_POST["nuevaDescripcion"],
                                "codigo" => $_POST["nuevoCodigo"],
                                "id_empresa" => $_POST["nuevaEmpresa"],
                                "id_tecnico" => $_POST["nuevoTecnico"]);

  			$respuesta = ModeloCasos::mdlIngresarCaso($tabla, $datos);

  			if($respuesta == "ok"){


  			echo '<script>

  					swal({

  							type: "success",
  							title: "El caso ha sido guardada correctamente", 
  							showConfirmButton: true,
  							confirmButtonText: "Cerrar",
  							closeOnConfirm: false

  							}).then((result)=>{

  									if(result.value){

  										window.location = "casos";
  									}

  								})

  				</script>';

  			}

  		}else{

  			echo '<script>

  					swal({

  							type: "error",
  							title: "!Los campos no puede ir vacía o llevar caracteres especiales!", 
  							showConfirmButton: true,
  							confirmButtonText: "Cerrar",
  							closeOnConfirm: false

  							}).then((result)=>{

  									if(result.value){

  										window.location = "casos";
  									}

  								})

  				</script>';



            }


        }

    }
    


  /*=============================================
    EDITAR CASO
    =============================================*/


    static public function ctrEditarCaso(){

        if(isset($_POST["editarDescripcions"])){

           if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcions"])){

                $tabla = "caso";

                $datos = array("id_empresa"=>$_POST["editarEmpresa"],
                               "id_tecnico"=>$_POST["editarTecnico"],
                                "descripcion"=>$_POST["editarDescripcions"]);

                $respuesta = ModeloCasos::mdlEditarCaso($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

                    swal({
                          type: "success",
                          title: "El caso ha sido cambiado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                          }).then((result) => {
                                    if (result.value) {

                                    window.location = "casos";

                                    }
                                })

                    </script>';

                }

            }else{

                echo'<script>

                    swal({
                          type: "error",
                          title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          closeOnConfirm: false
                          }).then((result) => {
                            if (result.value) {

                            window.location = "cosos";

                            }
                        })

                </script>';



            }

        }

    }

 /*=========================================
           ELIMINAR CASO
    ===========================================*/

    static public function ctrEliminarCaso(){

        if(isset($_GET["idCaso"])){

            $tabla = "caso";
            $datos = $_GET["idCaso"];

            $respuesta = ModeloCasos::mdlEliminarCaso($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({

                            type: "success",
                            title: "El caso ha sido borrada correctamente", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "casos";
                                    }

                                })

                </script>';


            }

        }

    }
  }

 