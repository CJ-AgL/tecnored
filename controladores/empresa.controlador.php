<?php 


class ControladorEmpresa{


/*=========================================
           MOSTRAR EMPRESAS
  ===========================================*/

  static public function ctrMostrarEmpresas($item, $valor){

    $tabla = "empresa";

    $respuesta = ModeloEmpresas::mdlMostrarEmpresas($tabla, $item, $valor);

    return $respuesta;

    }

    /*=========================================
           CREAR EMPRESA
  ===========================================*/

  static public function ctrCrearEmpresa(){

    if(isset($_POST["nuevaEmpresa"])){

  		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevaEmpresa"])){

  			$tabla = "empresa";

  			$datos = $_POST["nuevaEmpresa"];

  			$respuesta = ModeloEmpresas::mdlIngresarEmpresa($tabla, $datos);

  			if($respuesta == "ok"){


  			echo '<script>

  					swal({

  							type: "success",
  							title: "La empresa ha sido guardada correctamente", 
  							showConfirmButton: true,
  							confirmButtonText: "Cerrar",
  							closeOnConfirm: false

  							}).then((result)=>{

  									if(result.value){

  										window.location = "empresa";
  									}

  								})

  				</script>';

  			}

  		}else{

  			echo '<script>

  					swal({

  							type: "error",
  							title: "!La empresa no puede ir vacía o llevar caracteres especiales!", 
  							showConfirmButton: true,
  							confirmButtonText: "Cerrar",
  							closeOnConfirm: false

  							}).then((result)=>{

  									if(result.value){

  										window.location = "empresa";
  									}

  								})

  				</script>';

  			}

  		}

	}


	
/*=========================================
           EDITAR EMPRESA
  ===========================================*/

  static public function ctrEditarEmpresa(){

    if(isset($_POST["editarEmpresa"])){

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarEmpresa"])){

            $tabla = "empresa";

            $datos = array("emp_nombre"=>$_POST["editarEmpresa"],
                                "emp_id"=>$_POST["idEmpresa"]);

            $respuesta = ModeloEmpresas::mdlEditarEmpresa($tabla, $datos);

            if($respuesta == "ok"){


            echo '<script>

                    swal({

                            type: "success",
                            title: "La Empresa ha sido actualizada correctamente", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "empresa";
                                    }

                                })

                </script>';

            }

        }else{

            echo '<script>

                    swal({

                            type: "error",
                            title: "!La categoría no puede ir vacía o llevar caracteres especiales!", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "empresa";
                                    }

                                })

                </script>';

            }

        }

    }

    /*=========================================
           ELIMINAR EMPRESA
    ===========================================*/

    static public function ctrEliminarEmpresa(){

        if(isset($_GET["idEmpresa"])){

            $tabla = "empresa";
            $datos = $_GET["idEmpresa"];

            $respuesta = ModeloEmpresas::mdlEliminarEmpresa($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({

                            type: "success",
                            title: "La empresa ha sido borrada correctamente", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "empresa";
                                    }

                                })

                </script>';


            }

        }

    }

}

  