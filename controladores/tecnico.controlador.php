<?php 
class ControladorTecnico{

	/*=========================================
              INGRESO DE USUARIOS/TECNICO
  ===========================================*/

  	static public function ctrIngresoTecnico(){

  		if(isset($_POST["ingUsuario"])){

  			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) && 
  			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

  			   	$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "tecnico"; 

				$item = "tec_user";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloTecnico::mdlMostrarTecnico($tabla, $item, $valor);

				if(is_array($respuesta)){

				if($respuesta["tec_user"] == $_POST["ingUsuario"] && $respuesta["tec_pass"] == $encriptar){


					$_SESSION["iniciarSesion"] = "ok"; 
					$_SESSION["tec_id"] = $respuesta["tec_id"]; 
					$_SESSION["tec_user"] = $respuesta["tec_user"];
					$_SESSION["tec_pass"] = $respuesta["tec_pass"];
          			$_SESSION["tec_rol"] = $respuesta["tec_rol"];
					
          echo '<script>

          window.location =  "inicio";


          </script>';

				} else{

          echo '<br><div class="alert alert-danger">Usuario o contraseña incorrecta vuelve a intentar</div>';

        }


  		}
  
	 }

 }
}
 

/*=========================================
           MOSTRAR CATEGORIAS
  ===========================================*/

  static public function ctrMostrarTecnicos($item, $valor){

  	$tabla = "tecnico";

  	$respuesta = ModeloTecnico::mdlMostrarTecnico($tabla, $item, $valor);

  	return $respuesta;

    }
    

  
 /*=========================================
              REGISTRO DE USUARIOS
  ===========================================*/

  static public function ctrCrearTecnico(){

  	if(isset($_POST["nuevoUsuario"])){

  		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
  		   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
         preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) &&
         preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
  		   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

  		   	$tabla = "tecnico";

  		   	$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

  		   	$datos = array("tec_nombre" => $_POST["nuevoNombre"],
		  		   		   "tec_apellido" => $_POST["nuevoApellido"],
                   "tec_telefono" => $_POST["nuevoTelefono"],
                   "tec_user" => $_POST["nuevoUsuario"],
		  		   		   "tec_pass" => $encriptar,
		  		   		   "tec_rol" => $_POST["nuevoRol"]);		   

  		   	$respuesta = ModeloTecnico::mdlIngresarTecnico($tabla, $datos);

  		   	if($respuesta == "ok"){

  		   		echo '<script>

  					swal({

  							type: "success",
  							title: "!El Tecnico ha sido guardado correctamente!", 
  							showConfirmButton: true,
  							confirmButtonText: "Cerrar",
  							closeOnConfirm: false

  							}).then((result)=>{

  									if(result.value){

  										window.location = "tecnico";
  									}

  								})

  				</script>';

  		   	}

  		}else{

  				echo '<script>

  					swal({

  							type: "error",
  							title: "!El usuario no puede ir vacío o llevar caracteres especiales!", 
  							showConfirmButton: true,
  							confirmButtonText: "Cerrar",
  							closeOnConfirm: false

  							}).then((result)=>{

  									if(result.value){

  										window.location = "tecnico";
  									}

  								})

  				</script>';

  		}


  	 }

   }



  /*=========================================
              EDITAR USUARIO
  ===========================================*/

static public function ctrEditarUsuario(){

			if(isset($_POST["editarUsuario"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
  		   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarApellido"]) &&
         preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"])){


					$tabla = "tecnico";

					if($_POST["editarPassword"] != ""){

						if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

							$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

						}else{

							echo'<script>

									swal({
										  type: "error",
										  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result){
											if (result.value) {

											window.location = "tecnico";

											}
										})

								</script>';

						}

					}else{

						$encriptar = $_POST["passwordActual"];

					}

					$datos = array("tec_nombre" => $_POST["editarNombre"],
								   "tec_apellido" => $_POST["editarApellido"],
								   "tec_telefono" => $_POST["editarTelefono"],
								   "tec_user" => $_POST["editarUsuario"],
								   "tec_pass" => $encriptar,
								   "tec_rol" => $_POST["editarRol"]);

					$respuesta = ModeloTecnico::mdlEditarUsuario($tabla, $datos);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "Usuario modificado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							  }).then(function(result){
								if (result.value) {

										window.location = "tecnico";

										}
									})

						</script>';

					}


				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "tecnico";

								}
							});

					</script>';

				}

			}

		}
		
	/*=========================================
           ELIMINAR TECNICO
    ===========================================*/

    static public function ctrEliminarTecnico(){

        if(isset($_GET["idTecnico"])){

            $tabla = "tecnico";
            $datos = $_GET["idTecnico"];

            $respuesta = ModeloTecnico::mdlEliminarTecnico($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({

                            type: "success",
                            title: "El usuario ha sido borrada correctamente", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "tecnico";
                                    }

                                })

                </script>';


            }

        }

    }
}