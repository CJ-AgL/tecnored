<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/empresa.controlador.php";
require_once "controladores/tecnico.controlador.php";
require_once "controladores/casos.controlador.php";
require_once "controladores/imagen.controlador.php";
require_once "controladores/estado.controlador.php";


require_once "modelos/empresa.modelo.php";
require_once "modelos/tecnico.modelo.php";
require_once "modelos/casos.modelo.php";
require_once "modelos/imagen.modelo.php";
require_once "modelos/estado.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();