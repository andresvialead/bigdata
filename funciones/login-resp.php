<?php
require_once('../controladores/conexion/conexion.php');
require_once('../controladores/usuarios/ctrl_usuarios.php');



	if(isset($_POST['username']) && isset($_POST['password'])){

		$result=ctrl_usuarios::login($_POST['username'],$_POST['password']);

		echo $result;
	}



 ?>