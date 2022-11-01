<?php


require_once "../../../controladores/casos.controlador.php";
require_once "../../../modelos/casos.modelo.php";

require_once "../../../controladores/tecnico.controlador.php";
require_once "../../../modelos/tecnico.modelo.php";

require_once "../../../controladores/empresa.controlador.php";
require_once "../../../modelos/empresa.modelo.php";


class imprimirReporte{

public $codigo;

public function traerReporte(){

//INF. CASO

$itemCaso = "codigo";
$valorCaso = $this->codigo;

$respuestaCaso = ControladorCasos::ctrMostrarCasos($itemCaso, $valorCaso);

$descripcion = $respuestaCaso["descripcion"];
$fecha = $respuestaCaso["fecha"];
$idEmpresa = $respuestaCaso["id_empresa"];

//INF. EMPRESA

$itemEmpresa = "emp_id";
$valorEmpresa = $respuestaCaso["id_empresa"];

$respuestaEmpresa = ControladorEmpresa::ctrMostrarEmpresas($itemEmpresa, $valorEmpresa);

//INF. TECNICO

$itemTecnico = "tec_id";
$valorTecnico = $respuestaCaso["id_tecnico"];

$respuestaTecnico = ControladorTecnico::ctrMostrarTecnicos($itemTecnico, $valorTecnico);



//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();


// ---------------------------------------------------------
//PRIMER BLOQUE INF. DE LA EMPRESA 

$bloque1 = <<<EOF

	<table>

		
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>


	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Caso: $descripcion

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:left">
			
				Fecha: $fecha

			</td>

		</tr>

		<tr>

			<td style="border: 1px solid #666; background-color:white; width:540px">

			Tecncio: $respuestaTecnico[tec_nombre] $respuestaTecnico[tec_apellido]

		 </td>

		</tr>

			<tr>

			<td style="border: 1px solid #666; background-color:white; width:390px">

			Empresa: $respuestaEmpresa[emp_nombre] ID: $idEmpresa

		 </td>

		 <td style="border: 1px solid #666; background-color:white; width:150px; text-align:left">
			
				ID: $idEmpresa

			</td>

		</tr>

		<tr>

		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>



EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

//SALIDA DEL ARCHIVO
$pdf->Output('factura.pdf');


}

}

// almacenamos lo el codigo que viene en la variable get en la variable codigo.
$informe = new imprimirReporte();
$informe -> codigo = $_GET["codigo"];
$informe -> traerReporte();


?>