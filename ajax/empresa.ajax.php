<?php 

	require_once "../controladores/empresa.controlador.php";
	require_once "../modelos/empresa.modelo.php";
	
	class AjaxEmpresas{

	/*=============================================
    EDITAR EMPRESA
    =============================================*/ 

    public $idEmpresa;

    public function ajaxEditarEmpresa(){

    	$item = "emp_id";

    	$valor = $this->idEmpresa;

    	$respuesta = ControladorEmpresa::ctrMostrarEmpresas($item, $valor);

    	echo json_encode($respuesta);

    }

     /*=============================================
    VALIDAR NO REPETIR EMPRESA
    =============================================*/ 

    public  $validarEmpresa;

    public  function ajaxValidarEmpresa(){

        $item = "emp_nombre";
        $valor = $this->validarEmpresa;
        $respuesta = ControladorEmpresa::ctrMostrarEmpresas($item, $valor);

        echo json_encode($respuesta);


    }

}

	/*=============================================
    EDITAR EMPRESA
    =============================================*/ 
if(isset($_POST["idEmpresa"])){

	$empresa = new AjaxEmpresas();
	$empresa -> idEmpresa = $_POST["idEmpresa"];
	$empresa -> ajaxEditarEmpresa();

}


/*=============================================
    VALIDAR NO REPETIR USUARIO 
=============================================*/ 

if(isset($_POST["validarEmpresa"])){

    $valUsuario = new AjaxEmpresas();
    $valUsuario -> validarEmpresa = $_POST["validarEmpresa"];
    $valUsuario -> ajaxValidarEmpresa();

}