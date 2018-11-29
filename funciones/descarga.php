<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	require_once('../controladores/conexion/conexion.php');
	require_once('../controladores/campanyas/ctrl_campanyas.php');
	require_once('../modelos/campanyas/mdl_campanyas.php');
	
	if(isset($_GET['id_campanya']) && isset($_GET['nomb_creaty'])){

			$download_me = ctrl_campanyas::getCreativity($_GET['id_campanya']);

			//$download_me = "";
			header("Content-type: text/plain");
			header("Content-Disposition: attachment; filename=".$_GET['nomb_creaty'].".txt");
			echo 'hola'.$download_me;



	}
	
	


 ?>