<?php
function conectarse(){
	$serverName = "82.223.25.21, 1433";
   	try{

        $conexion = new PDO("sqlsrv:server=$serverName;Database = vialeadgeneration","root", "MQPJRJTXMKG3IS#");

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;

    }catch(PDOException $e){
       echo "ERROR SQL: " . $e->getMessage();

    }

}

function conectarseMYSQL(){


	try{

        $conexion = new PDO('mysql:host=82.223.25.21;dbname=mailing', 'mailing','rhBaT4plUh', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conexion;

        }catch(PDOException $e){

        //----Descomentar esta linea para ver errores de sql
            echo "ERROR: " . $e->getMessage();

        }     

}



?>