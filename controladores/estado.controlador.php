<?php 


class ControladorEstado{


/*=========================================
           MOSTRAR ESTADO
  ===========================================*/

  static public function ctrMostrarEstado($item, $valor){

    $tabla = "estado";

    $respuesta = ModeloEstado::mdlMostrarEstado($tabla, $item, $valor);

    return $respuesta;

    }
     
  }