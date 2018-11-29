<?php

class ctrl_registros{

	public static function create($registros){
		$idInsertada=0;
		$id=$registros->getId();
		$id_campanya=$registros->getId_campanya();
		$id_registro=$registros->getId_registro();
		$accion=$registros->getAccion();
		$fecha_accion=$registros->getFecha_accion();
		$url_click=$registros->getUrl_click();
		$fecha_envio=$registros->getFecha_envio();

		$conexion=conectarse();

		/*$sentencia = $conexion->prepare("INSERT INTO  afiliados VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$conexion->bind_param($nombre_afiliado, $cif, $direccion, $codigo_postal, $provincia, $poblacion, $email, $nombre_contacto, $apellidos_contacto, $telefono_contacto);*/

		$insertarSMSLog=$conexion->prepare("INSERT INTO registros (id_campanya, id_registro, accion, fecha_accion, url_click, fecha_envio) VALUES (:id_campanya, :id_registro, :accion, :fecha_accion, :url_click, :fecha_envio)");
                                    
        $insertarSMSLog->execute(array('id_campanya'=>$id_campanya,'id_registro'=>$id_registro,'accion'=>$accion,'fecha_accion'=>$fecha_accion,'url_click'=>$url_click,'fecha_envio'=>$fecha_envio));

		return $conexion->lastInsertId();
	}

	public static function get($id){
		$item = null;
		$sql = "SELECT * FROM registros WHERE id= ?";
		$conn = conexion::conexion_base_de_datos();
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i" ,$id);
		if($stmt->execute()){
			$stmt->bind_result($id, $id_campanya, $id_registro, $accion, $fecha_accion, $url_click, $fecha_envio);
			if($stmt->fetch()) {
				$item = new mdl_registros($id, $id_campanya, $id_registro, $accion, $fecha_accion, $url_click, $fecha_envio);
			}
		}
		$conn->close();
		return $item;
	}


	public static function getListas(){
		$lista = array();
		$sql = "SELECT distinct(lista) as 'listas' FROM registros_mailing where lista not in('ROBINSON','BAJA plataforma') order by lista asc";
		$conexion=conectarseMYSQL();
		$stmt = $conexion->prepare($sql);


		if($stmt->execute()){

			$result = $stmt->fetchAll();


			foreach ($result as $row) {
            $lista[] = $row['listas'];

        	}


		}

		return $lista;
	}



	public static function getRegistros($registro,$lista){


		$cantidad = $registro->getCantidad();
		$campanya = $registro->getId_campanya();
		$fecha_envio= $registro->getFecha_envio();
		$hora= $registro->getHora_envio();



		$listaid = "";
		$item= "";
		$sql = "SELECT id, email, nombre, sexo, fecha_nacimiento, cp, fecha_registro, origen
					from registros_mailing where lista  like '".$lista."' ";

		
		
		$conexion=conectarseMYSQL();
		$stmt = $conexion->prepare($sql);

		$conexion2=conectarse();



		$fechaexplode = explode("-", $fecha_envio);
                $dia = $fechaexplode[2];
                $mes = $fechaexplode[1];
                $anio = $fechaexplode[0];


        $horaexplode = explode(":", $hora);
                $hora_envio = $horaexplode[0];
      



		if($stmt->execute()){

			$result = $stmt->fetchAll();

	

			foreach ($result as $row) {
     

			$listaid.=	$row['id'].",";

            $item .= $row['id'].";".$row['email'].";".$row['nombre'].";".$row['sexo'].";".$row['fecha_nacimiento'].";".$row['cp'].";".$row['fecha_registro'].";".$row['origen'];
            $item .="\n";  

            $insertar_registros=$conexion2->prepare("INSERT INTO registros (id_campanya, id_registro, accion, fecha_envio) 
            	VALUES (".$campanya.",".$row['id'].",'Envio','".$dia."-".$mes."-".$anio." ".$hora."')");

             $insertar_registros->execute();

        	}

        	


		}


		//$conexion->close();


		$nombre="../descargas/Registros ".$fecha_envio." Hora ".$hora_envio." ".$cantidad.".csv";
					

		$archivo = fopen("$nombre","w");

		fwrite($archivo,$item); 
		fclose($archivo);

		//header('location: '.$nombre);

		echo $nombre;

		//echo $insertar_registros;

	}



	public static function getAll(){
		$lista = array();
		$sql = "SELECT * FROM registros";
		$conn = conexion::conexion_base_de_datos();
		$stmt = $conn->prepare($sql);
		if($stmt->execute()){
			$stmt->bind_result($id, $id_campanya, $id_registro, $accion, $fecha_accion, $url_click, $fecha_envio);
			while($stmt->fetch()) {
				$lista[] = new mdl_registros($id, $id_campanya, $id_registro, $accion, $fecha_accion, $url_click, $fecha_envio);
			}
		}
		$conn->close();
		return $lista;
	}

	public static function update($registros){
		$numRows=0;
		$id=$registros->getId();
		$id_campanya=$registros->getId_campanya();
		$id_registro=$registros->getId_registro();
		$accion=$registros->getAccion();
		$fecha_accion=$registros->getFecha_accion();
		$url_click=$registros->getUrl_click();
		$fecha_envio=$registros->getFecha_envio();
		$sql="UPDATE registros SET id_campanya= ?, id_registro= ?, accion= ?, fecha_accion= ?, url_click= ?, fecha_envio= ? WHERE id= ?";
$conn = conexion::conexion_base_de_datos();
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("iisisii" ,$id_campanya, $id_registro, $accion, $fecha_accion, $url_click, $fecha_envio, $id);
		$numRows=$stmt->execute();
		$conn->close();
		return $numRows;
	}

	public static function delete($id){
		$status=0;
	}

}