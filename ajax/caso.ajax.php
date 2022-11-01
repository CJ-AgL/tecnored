 <?php

    require_once "../controladores/casos.controlador.php";
	require_once "../modelos/casos.modelo.php";
	
	class AjaxCasos{

	/*=============================================
    EDITAR CASO
    =============================================*/ 

    public $idCaso;

    public function ajaxEditarCaso(){

    	$item = "id_caso";

    	$valor = $this->idCaso;

    	$respuesta = ControladorCasos::ctrMostrarCasos($item, $valor);

    	echo json_encode($respuesta);

    }


    /*=============================================
    VALIDAR NO REPETIR CASO
    =============================================*/ 

    public  $validarCaso;

    public  function ajaxValidarCaso(){

        $item = "descripcion";
        $valor = $this->validarCaso;
        $respuesta = ControladorCasos::ctrMostrarCasos($item, $valor);

        echo json_encode($respuesta);


    }

}

/*=============================================
    EDITAR CASO
    =============================================*/ 
if(isset($_POST["idCaso"])){

    $caso = new AjaxCasos();
    $caso -> idCaso = $_POST["idCaso"];
    $caso -> ajaxEditarCaso();

}


/*=============================================
    VALIDAR NO REPETIR CASO 
=============================================*/ 

if(isset($_POST["validarCaso"])){

    $valUsuario = new AjaxCasos();
    $valUsuario -> validarCaso = $_POST["validarCaso"];
    $valUsuario -> ajaxValidarCaso();

}