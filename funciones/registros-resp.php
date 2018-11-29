<?php
require_once('../controladores/conexion/conexion.php');
require_once('../controladores/registros/ctrl_registros.php');
require_once('../modelos/registros/mdl_registros.php');


if(isset($_POST['cantidad'])){

	$modeloRegistros = new mdl_registros('', $_POST['campanya'],  '', 'Envio', '', '', $_POST['fecha_envio'],$_POST['hora'],$_POST['cantidad']);
	
	$insertarRegistros = ctrl_registros::getRegistros($modeloRegistros,$_POST['lista']);


}else{
	echo "ERROR no existen";

}
?>