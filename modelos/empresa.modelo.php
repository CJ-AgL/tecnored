<?php 

require_once "conexion.php";


class ModeloEmpresas{


     /*=========================================
               MOSTRAR EMPRESAS 
      ===========================================*/

        static public function mdlMostrarEmpresas($tabla, $item, $valor){

        if($item != null){
  
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY emp_id DESC");
  
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

    /*=========================================
               CREAR EMPRESA
      ===========================================*/
    
      static public function mdlIngresarEmpresa($tabla, $datos){
    
          $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(emp_nombre) VALUES (:emp_nombre)");
    
          $stmt->bindParam(":emp_nombre", $datos, PDO::PARAM_STR);
    
          if($stmt->execute()){
    
                return "ok";
    
             }else{
    
                return "error";
             }
    
            $stmt->close();

             $stmt = null;

    
      }

    
/*=========================================
           EDITAR EMPRESA
  ===========================================*/

  static public function mdlEditarEmpresa($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET emp_nombre = :emp_nombre WHERE emp_id = :emp_id");

    $stmt->bindParam(":emp_nombre", $datos["emp_nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":emp_id", $datos["emp_id"], PDO::PARAM_STR);

    if($stmt->execute()){

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

	static public function mdlEliminarEmpresa($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE emp_id = :emp_id");
  
        $stmt->bindParam("emp_id", $datos, PDO::PARAM_STR);
  
         if($stmt -> execute()){
  
           return "ok";
  
        }else{
  
           return "error";
        }

        $stmt->close();

  
        $stmt = null;
  
      }


}
