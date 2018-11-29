<?php

class mdl_registros{

	private $id;
	private $id_campanya;
	private $id_registro;
	private $accion;
	private $fecha_accion;
	private $url_click;
	private $fecha_envio;
	private $hora_envio;
	private $cantidad;


	function __construct($id, $id_campanya, $id_registro, $accion, $fecha_accion, $url_click, $fecha_envio,$hora_envio,$cantidad){
		$this->id = $id;
		$this->id_campanya = $id_campanya;
		$this->id_registro = $id_registro;
		$this->accion = $accion;
		$this->fecha_accion = $fecha_accion;
		$this->url_click = $url_click;
		$this->fecha_envio = $fecha_envio;

		$this->hora_envio = $hora_envio;
		$this->cantidad= $cantidad;
	}

	function getId() {
		return $this->id;
	}

	function getId_campanya() {
		return $this->id_campanya;
	}

	function getId_registro() {
		return $this->id_registro;
	}

	function getAccion() {
		return $this->accion;
	}

	function getFecha_accion() {
		return $this->fecha_accion;
	}

	function getUrl_click() {
		return $this->url_click;
	}

	function getFecha_envio() {
		return $this->fecha_envio;
	}

	function getHora_envio() {
		return $this->hora_envio;
	}


	function getCantidad() {
		return $this->cantidad;
	}


	function setId($id) {
		$this->id = $id;
	}

	function setId_campanya($id_campanya) {
		$this->id_campanya = $id_campanya;
	}

	function setId_registro($id_registro) {
		$this->id_registro = $id_registro;
	}

	function setAccion($accion) {
		$this->accion = $accion;
	}

	function setFecha_accion($fecha_accion) {
		$this->fecha_accion = $fecha_accion;
	}

	function setUrl_click($url_click) {
		$this->url_click = $url_click;
	}

	function setFecha_envio($fecha_envio) {
		$this->fecha_envio = $fecha_envio;
	}

	function setHora_envio($hora_envio) {
		$this->hora_envio = $hora_envio;
	}

	function setCantidad($cantidad) {
		$this->cantidad = $cantidad;
	}


}
