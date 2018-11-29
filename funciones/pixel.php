<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

	require_once('../controladores/conexion/conexion.php');
	require_once('../controladores/registros/ctrl_registros.php');
	require_once('../modelos/registros/mdl_registros.php');

	date_default_timezone_set('Europe/Madrid');
	$fecha = date("d/m/Y H:i:s");
	

	if (isset($_GET['id_campanya'])) {
		

		if($_GET['accion']=='Click'){
			$modelo_registro= new mdl_registros('',$_GET['id_campanya'],$_GET['id_registro'],$_GET['accion'],$fecha,$_GET['url_click'],'1900-01-01 00:00:00','','');

			$insertar_registro=ctrl_registros::create($modelo_registro);
			header("Location: ".$_GET['url_click']);

		}else{
			$modelo_registro= new mdl_registros('',$_GET['id_campanya'],$_GET['id_registro'],$_GET['accion'],$fecha,'','01/01/1900 00:00:00','','');
			$insertar_registro=ctrl_registros::create($modelo_registro);
		}
		


	}else{

		echo "error";
	}

 ?>