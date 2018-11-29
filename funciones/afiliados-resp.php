<?php
require_once('../controladores/conexion/conexion.php');
require_once('../controladores/afiliados/ctrl_afiliados.php');
require_once('../modelos/afiliados/mdl_afiliados.php');

if(isset($_POST['nombre_afiliado'])){
	$modeloAfiliados = new mdl_afiliados('', $_POST['nombre_afiliado'], $_POST['cif_afiliado'], $_POST['direccion_afiliado'], $_POST['cp_afiliado'], $_POST['provincia_afiliado'], $_POST['poblacion_afiliado'], $_POST['email'], $_POST['nombre'], $_POST['apellidos'], $_POST['telefono']);

	$insertarAfiliado = ctrl_afiliados::create($modeloAfiliados);

	if($insertarAfiliado > 0){
		echo $insertarAfiliado;

	}else{
		echo "ERROR";
	}

}else{
	echo "ERROR";

}
?>