<?php 


class ctrl_usuarios{

	public static function login($usuario,$password){

		$sql = "SELECT * from usuariosvlg where usuario='".$usuario."'";
		$conexion=conectarse();
		$stmt = $conexion->prepare($sql);
		if($stmt->execute()){

			$result = $stmt->fetchAll();

			foreach ($result as $row) {
				if($row['password'] == $password){
					echo $datos= new mdl_usuario($row['id'],$row['usuario'],$row['password'],$row['tipo']);
    				
	    		}else{
	    			echo "false";
	    			
	    		}
			}	
        	
		}else{
			echo "El usuario no existe";
		}
	}	

}

 ?>