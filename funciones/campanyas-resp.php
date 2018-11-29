<?php
require_once('../controladores/conexion/conexion.php');
require_once('../controladores/campanyas/ctrl_campanyas.php');
require_once('../modelos/campanyas/mdl_campanyas.php');

if(isset($_POST['nombre_campanya'])){

	$modeloCampanyas = new mdl_campanyas('', '', $_POST['nombre_campanya'], $_POST['afiliado'], $_POST['tipo_coste'], $_POST['coste'], $_POST['plataforma_envio'], $_POST['coste_envio'], $_POST['asunto_campanya'], $_POST['html_creatividad'], $_POST['sector']);
										//$id, $fecha_creacion, $nombre_campanya, $id_afiliado, $tipo_coste, $coste, $plataforma_envio, $coste_envio, $asunto, $html_creatividad, $sector

	$insertarCampanya = ctrl_campanyas::create($modeloCampanyas);

	if($insertarCampanya > 0){

		echo $insertarCampanya;

	}else{

		//echo $insertarCampanya;
		echo "ERROR";
	}

}else if(isset($_POST['idCampanya'])){

	//$datos=array();
	$datos=ctrl_campanyas::getContador($_POST['idCampanya']);
	
	return $datos;

}



	





?>