<?php

class ctrl_afiliados{

	public static function create($afiliados){
		$idInsertada=0;
		$id=$afiliados->getId();
		$nombre_afiliado=$afiliados->getNombre_afiliado();
		$cif=$afiliados->getCif();
		$direccion=$afiliados->getDireccion();
		$codigo_postal=$afiliados->getCodigo_postal();
		$provincia=$afiliados->getProvincia();
		$poblacion=$afiliados->getPoblacion();
		$email=$afiliados->getEmail();
		$nombre_contacto=$afiliados->getNombre_contacto();
		$apellidos_contacto=$afiliados->getApellidos_contacto();
		$telefono_contacto=$afiliados->getTelefono_contacto();
		$conexion=conectarse();

		/*$sentencia = $conexion->prepare("INSERT INTO  afiliados VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$conexion->bind_param($nombre_afiliado, $cif, $direccion, $codigo_postal, $provincia, $poblacion, $email, $nombre_contacto, $apellidos_contacto, $telefono_contacto);*/

		$insertarSMSLog=$conexion->prepare("INSERT INTO afiliados (nombre_afiliado, cif, direccion, codigo_postal, provincia, poblacion, email, nombre_contacto, apellidos_contacto, telefono_contacto) VALUES (:nombre_afiliado, :cif_afiliado, :direccion_afiliado, :cp_afiliado, :provincia_afiliado, :poblacion_afiliado, :email, :nombre, :apellidos, :telefono)");
                                    
        $insertarSMSLog->execute(array('nombre_afiliado'=>$nombre_afiliado,'cif_afiliado'=>$cif,'direccion_afiliado'=>$direccion,'cp_afiliado'=>$codigo_postal,'provincia_afiliado'=>$provincia,'poblacion_afiliado'=>$poblacion,'email'=>$email,'nombre'=>$nombre_contacto,'apellidos'=>$apellidos_contacto,'telefono'=>$telefono_contacto));

		 return $conexion->lastInsertId();
	}

	public static function get($id){
		$item = null;
		$sql = "SELECT * FROM afiliados WHERE id= ?";
		$conexion=conectarse();
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i" ,$id);
		if($stmt->execute()){
			$stmt->bind_result($id, $nombre_afiliado, $cif, $direccion, $codigo_postal, $provincia, $poblacion, $email, $nombre_contacto, $apellidos_contacto, $telefono_contacto);
			if($stmt->fetch()) {
				$item = new mdl_afiliados($id, $nombre_afiliado, $cif, $direccion, $codigo_postal, $provincia, $poblacion, $email, $nombre_contacto, $apellidos_contacto, $telefono_contacto);
			}
		}
		$conn->close();
		return $item;
	}

	public static function getAll(){
		$lista = array();
		$sql = "SELECT * FROM afiliados";
		$conexion=conectarse();
		$stmt = $conexion->prepare($sql);
		if($stmt->execute()){

			$result = $stmt->fetchAll();

	        foreach ($result as $row) {
	            $lista[] = new mdl_afiliados($row['id'], $row['nombre_afiliado'], $row['cif'], $row['direccion'], $row['codigo_postal'], $row['provincia'], $row['poblacion'], $row['email'], $row['nombre_contacto'], $row['apellidos_contacto'], $row['telefono_contacto']);

	        }

		}

		return $lista;
	}

	public static function update($afiliados){
		$numRows=0;
		$id=$afiliados->getId();
		$nombre_afiliado=$afiliados->getNombre_afiliado();
		$cif=$afiliados->getCif();
		$direccion=$afiliados->getDireccion();
		$codigo_postal=$afiliados->getCodigo_postal();
		$provincia=$afiliados->getProvincia();
		$poblacion=$afiliados->getPoblacion();
		$email=$afiliados->getEmail();
		$nombre_contacto=$afiliados->getNombre_contacto();
		$apellidos_contacto=$afiliados->getApellidos_contacto();
		$telefono_contacto=$afiliados->getTelefono_contacto();
		$sql="UPDATE afiliados SET nombre_afiliado= ?, cif= ?, direccion= ?, codigo_postal= ?, provincia= ?, poblacion= ?, email= ?, nombre_contacto= ?, apellidos_contacto= ?, telefono_contacto= ? WHERE id= ?";
$conn = conexion::conexion_base_de_datos();
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssssssssssi" ,$nombre_afiliado, $cif, $direccion, $codigo_postal, $provincia, $poblacion, $email, $nombre_contacto, $apellidos_contacto, $telefono_contacto, $id);
		$numRows=$stmt->execute();
		$conn->close();
		return $numRows;
	}

	public static function delete($id){
		$status=0;
	}

}