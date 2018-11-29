<?php 

class mdl_usuario{


	private $id;
	private $usuario;
	private $password;
	private $tipo;


	function __construct($id,$usuario,$password,$tipo){

		$this->id=$id;
		$this->usuario=$usuario;
		$this->password=$password;
		$this->tipo=$tipo;

	}


	function getId() {
		return $this->id;
	}

	function getUsuario(){
		return $this->usuario;
	}

	function getPassword(){
		return $this->usuario;
	}

	function getTipo(){
		return $this->tipo;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setUsuario($usuario){
		$this->usuario=$usuario;
	}

	function setPassword($password){
		$this->password=$password;
	}

	function setTipo($tipo){
		$this->tipo=$tipo;
	}


}


 ?>