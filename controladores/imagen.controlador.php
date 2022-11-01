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
     
  }