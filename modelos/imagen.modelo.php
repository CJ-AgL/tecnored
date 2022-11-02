<?php 

require_once "conexion.php";

class ModeloImagen{


   /*=============================================
   MOSTRAR IMAGEN
   =============================================*/

   static public function mdlMostrarImagen($tabla, $item, $valor){

        if($item != null){
  
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
  
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
  
            $stmt -> execute();
  
            return $stmt -> fetch();
  
  
        }else{
  
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
  
            $stmt -> execute();
  
            return $stmt -> fetchAll();
  
        }

          $stmt->close();

         $stmt = null;

  
    }

   /*=============================================
   CARGAR IMAGEN
   =============================================*/

      static public function mdlIngresarImagen($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(img_estado, img_caso, img_imagen) VALUES (:img_estado, :img_caso, :img_imagen)");


        $stmt->bindParam(":img_caso", $datos["img_caso"], PDO::PARAM_STR);
        $stmt->bindParam(":img_estado", $datos["img_estado"], PDO::PARAM_STR);
         $stmt->bindParam(":img_imagen", $datos["img_imagen"], PDO::PARAM_STR);



        if($stmt->execute()){

            return "ok";

        }else{

            return "error";
        
        }

        $stmt->close();
        $stmt = null;


      }

   /*=============================================
   ELIMINAR IMAGEN
   =============================================*/

  static public function mdlEliminarImagen($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE img_id = :img_id");
  
        $stmt->bindParam("img_id", $datos, PDO::PARAM_INT);
  
         if($stmt -> execute()){
  
           return "ok";
  
        }else{
  
           return "error";
        }

        $stmt->close();

        $stmt = null;
  
      }

}
