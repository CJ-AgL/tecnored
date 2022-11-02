<?php 
require_once "conexion.php";

class ModeloCasos{

     
/*=========================================
        MOSTRAR CASOS
  ===========================================*/
  static public function mdlMostrarCasos($tabla, $item, $valor){

    if($item != null){

         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

         $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

         $stmt -> execute();

         return $stmt -> fetch();

        }else{

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        
        $stmt->execute();
        
        return $stmt -> fetchAll();
        

    }

         $stmt->close();

        $stmt = null;
    
      
    }
  


/*=========================================
           CREAR CASO
  ===========================================*/
static public function mdlIngresarCaso($tabla, $datos){

  $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion, codigo, id_empresa, id_tecnico) VALUES (:descripcion, :codigo, :id_empresa, :id_tecnico)");

  
  $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
  $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
  $stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
  $stmt->bindParam(":id_tecnico", $datos["id_tecnico"], PDO::PARAM_STR);

  if($stmt->execute()){

      return "ok";

     }else{

      return "error";

      }
      
      
        $stmt->close();

        $stmt = null;
  }
  

/*=========================================
           EDITAR CASO
  ===========================================*/

static public function mdlEditarCaso($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  descripcion = :descripcion, id_empresa = :id_empresa, id_tecnico = :id_tecnico 
        WHERE codigo = :codigo");

         $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
         $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
         $stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
         $stmt->bindParam(":id_tecnico", $datos["id_tecnico"], PDO::PARAM_STR);
         

      if($stmt -> execute()){

         return "ok";

      }else{

         return "error";
      }
      
         $stmt->close();

         $stmt = null;

   }



  /*=============================================
  ELIMINAR CASO
  =============================================*/

  static public function mdlEliminarCaso($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_caso = :id_caso");
  
        $stmt->bindParam("id_caso", $datos, PDO::PARAM_STR);
  
         if($stmt -> execute()){
  
           return "ok";
  
        }else{
  
           return "error";
        }

        $stmt->close();

  
        $stmt = null;
  
      }
  
}

    

