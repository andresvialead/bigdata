<?php

class ctrl_campanyas{

	public static function create($campanyas){
		$idInsertada=0;
		$id=$campanyas->getId();
		$fecha_creacion=$campanyas->getFecha_creacion();
		$nombre_campanya=$campanyas->getNombre_campanya();
		$id_afiliado=$campanyas->getId_afiliado();
		$tipo_coste=$campanyas->getTipo_coste();
		$coste=$campanyas->getCoste();
		$plataforma_envio=$campanyas->getPlataforma_envio();
		$coste_envio=$campanyas->getCoste_envio();
		$asunto=$campanyas->getAsunto();
		$html_creatividad=$campanyas->getHtml_creatividad();
		$sector=$campanyas->getSector();
		$sql = "INSERT INTO  campanyas VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		/*$conn = conexion::conexion_base_de_datos();


		$stmt = $conn->prepare($sql);
		$stmt->bind_param("isisisisss" ,$fecha_creacion, $nombre_campanya, $id_afiliado, $tipo_coste, $coste, $plataforma_envio, $coste_envio, $asunto, $html_creatividad, $sector);
		$stmt->execute();
		$idInsertada = mysqli_insert_id($conn);
		$conn->close();*/

		$conexion=conectarse();

		$insertarCampanya=$conexion->prepare("INSERT INTO campanyas (fecha_creacion,nombre_campanya, id_afiliado, tipo_coste, coste, plataforma_envio, coste_envio, asunto, html_creatividad, sector) 
														VALUES (CURRENT_TIMESTAMP,:nombre_campanya, :id_afiliado, :tipo_coste, :coste, :plataforma_envio, :coste_envio, :asunto, :html_creatividad, :sector)");
                                    
        $insertarCampanya->execute(array('nombre_campanya'=>$nombre_campanya,'id_afiliado'=>$id_afiliado,'tipo_coste'=>$tipo_coste,'coste'=>$coste,'plataforma_envio'=>$plataforma_envio,'coste_envio'=>$coste_envio,'asunto'=>$asunto,'html_creatividad'=>$html_creatividad,'sector'=>$sector));

		 return $conexion->lastInsertId();

	}

	public static function get($id){
		$item = null;
		$sql = "SELECT * FROM campanyas WHERE id= ?";
		$conn = conexion::conexion_base_de_datos();
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i" ,$id);
		if($stmt->execute()){
			$stmt->bind_result($id, $fecha_creacion, $nombre_campanya, $id_afiliado, $tipo_coste, $coste, $plataforma_envio, $coste_envio, $asunto, $html_creatividad, $sector);
			if($stmt->fetch()) {
				$item = new mdl_campanyas($id, $fecha_creacion, $nombre_campanya, $id_afiliado, $tipo_coste, $coste, $plataforma_envio, $coste_envio, $asunto, $html_creatividad, $sector);
			}
		}
		$conn->close();
		return $item;
	}

	public static function getAll(){
		$lista = array();
		$sql = "SELECT c.id,c.fecha_creacion,c.nombre_campanya,a.nombre_afiliado,c.tipo_coste,c.plataforma_envio,c.coste_envio,c.asunto,c.html_creatividad,c.sector,c.coste FROM campanyas as c inner join afiliados as a on c.id_afiliado=a.id";
		$conexion=conectarse();
		$stmt = $conexion->prepare($sql);


		if($stmt->execute()){

			$result = $stmt->fetchAll();

			//$stmt->bind_result($id, $fecha_creacion, $nombre_campanya, $id_afiliado, $tipo_coste, $coste, $plataforma_envio, $coste_envio, $asunto, $html_creatividad, $sector);
			
			/*while($stmt->fetch()) {
				$lista[] = new mdl_campanyas($id, $fecha_creacion, $nombre_campanya, $id_afiliado, $tipo_coste, $coste, $plataforma_envio, $coste_envio, $asunto, $html_creatividad, $sector);
			}*/

			foreach ($result as $row) {
            $lista[] = new mdl_campanyas($row['id'], $row['fecha_creacion'], $row['nombre_campanya'], trim($row['nombre_afiliado']), $row['tipo_coste'], $row['coste'], $row['plataforma_envio'], $row['coste_envio'], $row['asunto'], $row['html_creatividad'], $row['sector']);

        	}


		}

		//$conn->close();
		return $lista;
	}

	public static function update($campanyas){
		$numRows=0;
		$id=$campanyas->getId();
		$fecha_creacion=$campanyas->getFecha_creacion();
		$nombre_campanya=$campanyas->getNombre_campanya();
		$id_afiliado=$campanyas->getId_afiliado();
		$tipo_coste=$campanyas->getTipo_coste();
		$coste=$campanyas->getCoste();
		$plataforma_envio=$campanyas->getPlataforma_envio();
		$coste_envio=$campanyas->getCoste_envio();
		$asunto=$campanyas->getAsunto();
		$html_creatividad=$campanyas->getHtml_creatividad();
		$sector=$campanyas->getSector();
		$sql="UPDATE campanyas SET fecha_creacion= ?, nombre_campanya= ?, id_afiliado= ?, tipo_coste= ?, coste= ?, plataforma_envio= ?, coste_envio= ?, asunto= ?, html_creatividad= ?, sector= ? WHERE id= ?";
$conn = conexion::conexion_base_de_datos();
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("isisisisssi" ,$fecha_creacion, $nombre_campanya, $id_afiliado, $tipo_coste, $coste, $plataforma_envio, $coste_envio, $asunto, $html_creatividad, $sector, $id);
		$numRows=$stmt->execute();
		$conn->close();
		return $numRows;
	}

	public static function delete($id){
		$status=0;
	}

	public static function getCreativity($idCampanya){

	$sql="select html_creatividad from campanyas where id=".$idCampanya;	
	$conexion=conectarse();
	$html="";
	$stmt = $conexion->prepare($sql); 
	
	//echo $sql;
	if($stmt->execute()){

			$result = $stmt->fetchAll();

			foreach ($result as $row) {
            $html = $row['html_creatividad'];

        	}
        	return $html;
		}	


	}


	public static function getContador($idCampanya){

		$sql="select distinct(count(accion)) as total,accion from registros where id_campanya=".$idCampanya."group by accion";

		$conexion=conectarse();
		$datos=array();

		$stmt = $conexion->prepare($sql); 
	
	
			if($stmt->execute()){

				$result = $stmt->fetchAll();

				foreach ($result as $row) {
	          
	            	$datos[]= new mdl_campanyas($row['accion'],$row['total']);
	            	echo $row['accion'].": ".$row['total']."<br>";

	        	}
        	
			}


			return $datos;	


	}




}