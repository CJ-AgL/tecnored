<?php 

require_once "conexion.php";

class ModeloTecnico{

   /*=============================================
   MOSTRAR USUARIOS
   =============================================*/

   static public function mdlMostrarTecnico($tabla, $item, $valor){

        if($item != null){
  
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY tec_id DESC");
  
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

    
  /* =========================================
             REGISTRO USUARIOS
  ===========================================*/

  static public function mdlIngresarTecnico($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tec_nombre, tec_apellido, tec_telefono, tec_user, tec_pass, tec_rol)
                                             VALUES (:tec_nombre, :tec_apellido, :tec_telefono, :tec_user, :tec_pass, :tec_rol)");

    $stmt->bindParam(":tec_nombre", $datos["tec_nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":tec_apellido", $datos["tec_apellido"], PDO::PARAM_STR);
    $stmt->bindParam(":tec_telefono", $datos["tec_telefono"], PDO::PARAM_STR);
    $stmt->bindParam(":tec_user", $datos["tec_user"], PDO::PARAM_STR);
    $stmt->bindParam(":tec_pass", $datos["tec_pass"], PDO::PARAM_STR);
     $stmt->bindParam(":tec_rol", $datos["tec_rol"], PDO::PARAM_STR);

    if($stmt->execute()){

       return "ok";

    }else{

       return "error";
    }

         $stmt->close();

         $stmt = null;

  }

/* =========================================
             EDITAR USUARIOS
  ===========================================*/

   static public function mdlEditarUsuario($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tec_nombre = :tec_nombre, tec_apellido = :tec_apellido, tec_telefono = :tec_telefono, tec_pass = :tec_pass, 
                                             tec_rol = :tec_rol WHERE tec_user= :tec_user");

         $stmt->bindParam(":tec_nombre", $datos["tec_nombre"], PDO::PARAM_STR);
         $stmt->bindParam(":tec_apellido", $datos["tec_apellido"], PDO::PARAM_STR);
         $stmt->bindParam(":tec_telefono", $datos["tec_telefono"], PDO::PARAM_STR);
         $stmt->bindParam(":tec_user", $datos["tec_user"], PDO::PARAM_STR);
         $stmt->bindParam(":tec_pass", $datos["tec_pass"], PDO::PARAM_STR);
         $stmt->bindParam(":tec_rol", $datos["tec_rol"], PDO::PARAM_STR);
         

      if($stmt -> execute()){

         return "ok";

      }else{

         return "error";
      }
      
         $stmt->close();

         $stmt = null;

   }


   /*=============================================
   ELIMINAR EMPRESA
   =============================================*/

   static public function mdlEliminarTecnico($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE tec_id = :tec_id");
  
        $stmt->bindParam("tec_id", $datos, PDO::PARAM_STR);
  
         if($stmt -> execute()){
  
           return "ok";
  
        }else{
  
           return "error";
        }

        $stmt->close();

  
        $stmt = null;
  
      }
  
}


