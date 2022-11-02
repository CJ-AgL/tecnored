<?php 


class ControladorImagen{


/*=========================================
           MOSTRAR EMPRESAS
  ===========================================*/

  static public function ctrMostrarImagen($item, $valor){

    $tabla = "imagen";

    $respuesta = ModeloImagen::mdlMostrarImagen($tabla, $item, $valor);

    return $respuesta;

    }
     

/*=========================================
           CARGAR IMAGEN
  ===========================================*/

    static public function ctrCargarImagen(){

        if(isset($_POST["submit"])){

          /*=============================================
        VALIDAR IMAGEN
        =============================================*/

        $ruta = "";

        if(isset($_FILES["nuevaFoto"]["tmp_name"])){

          list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

          $nuevoAncho = 600;
          $nuevoAlto = 600;

          /*=============================================
          CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
          =============================================*/

          $directorio = "vistas/img/imgCaso/".$_POST["nuevoCasos"];

          mkdir($directorio, 0755);

          /*=============================================
          DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
          =============================================*/

          if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

            /*=============================================
            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
            =============================================*/

            $aleatorio = mt_rand(100,999);

            $ruta = "vistas/img/imgCaso/".$_POST["nuevoCasos"]."/".$aleatorio.".jpg";

            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);            

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);

          }

          if($_FILES["nuevaFoto"]["type"] == "image/png"){

            /*=============================================
            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
            =============================================*/

            $aleatorio = mt_rand(100,999);

            $ruta = "vistas/img/imgCaso/".$_POST["nuevoCasos"]."/".$aleatorio.".png";

            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);           

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);

          }

            $tabla = "imagen";
        
                $datos = array("nota" => $_POST["nuevaNota"],
                                "img_estado" => $_POST["nuevoEstado"],
                                "img_caso" => $_POST["nuevoCasos"],
                                "img_imagen" => $ruta);

        $respuesta = ModeloImagen::mdlIngresarImagen($tabla, $datos);

        if($respuesta == "ok"){


        echo '<script>

            swal({

                type: "success",
                title: "Registro guardado correctamente", 
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: false

                }).then((result)=>{

                    if(result.value){

                      window.location = "imagen";
                    }

                  })

          </script>';

        }
      
              
      }else{

        echo '<script>

            swal({

                type: "error",
                title: "!Error al guardar el registro!", 
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: false

                }).then((result)=>{

                    if(result.value){

                      window.location = "imagen";
                    }

                  })

          </script>';



            }

        }
  }

  /*=========================================
           ELIMINAR IMAGEN
  ===========================================*/

   static public function ctrEliminarImagen(){

    if(isset($_GET["idImagen"])){

      $tabla = "imagen";
      $datos = $_GET["idImagen"];

      if($_GET["imagenCaso"] != ""){

      unlink($_GET["imagenCaso"]); 
      rmdir('vistas/img/imgCaso/'.$_GET["caso"]);

      }

      $respuesta = ModeloImagen::mdlEliminarImagen($tabla, $datos);


        if($respuesta == "ok"){


        echo '<script>

            swal({

                type: "success",
                title: "Registro Eliminado correctamente", 
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: false

                }).then((result)=>{

                    if(result.value){

                      window.location = "imagen";
                    }

                  })

          </script>';

        }

    }

   }

}