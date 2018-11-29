<?php

class mdl_afiliados{

	private $id;
	private $nombre_afiliado;
	private $cif;
	private $direccion;
	private $codigo_postal;
	private $provincia;
	private $poblacion;
	private $email;
	private $nombre_contacto;
	private $apellidos_contacto;
	private $telefono_contacto;

	function __construct($id, $nombre_afiliado, $cif, $direccion, $codigo_postal, $provincia, $poblacion, $email, $nombre_contacto, $apellidos_contacto, $telefono_contacto){
		$this->id = $id;
		$this->nombre_afiliado = $nombre_afiliado;
		$this->cif = $cif;
		$this->direccion = $direccion;
		$this->codigo_postal = $codigo_postal;
		$this->provincia = $provincia;
		$this->poblacion = $poblacion;
		$this->email = $email;
		$this->nombre_contacto = $nombre_contacto;
		$this->apellidos_contacto = $apellidos_contacto;
		$this->telefono_contacto = $telefono_contacto;
	}

	function getId() {
		return $this->id;
	}

	function getNombre_afiliado() {
		return $this->nombre_afiliado;
	}

	function getCif() {
		return $this->cif;
	}

	function getDireccion() {
		return $this->direccion;
	}

	function getCodigo_postal() {
		return $this->codigo_postal;
	}

	function getProvincia() {
		return $this->provincia;
	}

	function getPoblacion() {
		return $this->poblacion;
	}

	function getEmail() {
		return $this->email;
	}

	function getNombre_contacto() {
		return $this->nombre_contacto;
	}

	function getApellidos_contacto() {
		return $this->apellidos_contacto;
	}

	function getTelefono_contacto() {
		return $this->telefono_contacto;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre_afiliado($nombre_afiliado) {
		$this->nombre_afiliado = $nombre_afiliado;
	}

	function setCif($cif) {
		$this->cif = $cif;
	}

	function setDireccion($direccion) {
		$this->direccion = $direccion;
	}

	function setCodigo_postal($codigo_postal) {
		$this->codigo_postal = $codigo_postal;
	}

	function setProvincia($provincia) {
		$this->provincia = $provincia;
	}

	function setPoblacion($poblacion) {
		$this->poblacion = $poblacion;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function setNombre_contacto($nombre_contacto) {
		$this->nombre_contacto = $nombre_contacto;
	}

	function setApellidos_contacto($apellidos_contacto) {
		$this->apellidos_contacto = $apellidos_contacto;
	}

	function setTelefono_contacto($telefono_contacto) {
		$this->telefono_contacto = $telefono_contacto;
	}

}
