<?php

require_once "../controladores/tecnico.controlador.php";
require_once "../modelos/tecnico.modelo.php";

class AjaxUsuarios{

    /*=============================================
    EDITAR USUARIO
    =============================================*/ 

    public $idTecnico;

    public function ajaxEditarUsuario(){

        $item = "tec_id";
        $valor = $this->idTecnico;
        $respuesta = ControladorTecnico::ctrMostrarTecnicos($item, $valor);

        echo json_encode($respuesta);

    }

    /*=============================================
    VALIDAR NO REPETIR USUARIO
    =============================================*/ 

    public  $validarUsuario;

    public  function ajaxValidarUsuario(){

        $item = "tec_user";
        $valor = $this->validarUsuario;
        $respuesta = ControladorTecnico::ctrMostrarTecnicos($item, $valor);

        echo json_encode($respuesta);


    }


}

 /*=============================================
    EDITAR USUARIO
    =============================================*/ 
    if(isset($_POST["idTecnico"])){

    $editar = new AjaxUsuarios();
    $editar -> idTecnico = $_POST["idTecnico"];
    $editar -> ajaxEditarUsuario();


    }

/*=============================================
    VALIDAR NO REPETIR USUARIO 
=============================================*/ 

if(isset($_POST["validarUsuario"])){

    $valUsuario = new AjaxUsuarios();
    $valUsuario -> validarUsuario = $_POST["validarUsuario"];
    $valUsuario -> ajaxValidarUsuario();

}