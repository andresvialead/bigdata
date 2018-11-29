<?php

class mdl_campanyas{

	private $id;
	private $fecha_creacion;
	private $nombre_campanya;
	private $id_afiliado;
	private $tipo_coste;
	private $coste;
	private $plataforma_envio;
	private $coste_envio;
	private $asunto;
	private $html_creatividad;
	private $sector;
	private $accion;
	private $total;

	function __construct()
	{
		//obtengo un array con los parámetros enviados a la función
		$params = func_get_args();
		//saco el número de parámetros que estoy recibiendo
		$num_params = func_num_args();
		//cada constructor de un número dado de parámtros tendrá un nombre de
		
		//atendiendo al siguiente modelo __construct1() __construct2()...
		$funcion_constructor ='__construct'.$num_params;
		//compruebo si hay un constructor con ese número de parámetros
		if (method_exists($this,$funcion_constructor)) {
			//si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
			call_user_func_array(array($this,$funcion_constructor),$params);
		}
	}

	function __construct11($id, $fecha_creacion, $nombre_campanya, $id_afiliado, $tipo_coste, $coste, $plataforma_envio, $coste_envio, $asunto, $html_creatividad, $sector){
		$this->id = $id;
		$this->fecha_creacion = $fecha_creacion;
		$this->nombre_campanya = $nombre_campanya;
		$this->id_afiliado = $id_afiliado;
		$this->tipo_coste = $tipo_coste;
		$this->coste = $coste;
		$this->plataforma_envio = $plataforma_envio;
		$this->coste_envio = $coste_envio;
		$this->asunto = $asunto;
		$this->html_creatividad = $html_creatividad;
		$this->sector = $sector;
	}

	function __construct2($accion, $total){

		$this->accion=$accion;
		$this->total=$total;

	}


	




	function getId() {
		return $this->id;
	}

	function getFecha_creacion() {
		return $this->fecha_creacion;
	}

	function getNombre_campanya() {
		return $this->nombre_campanya;
	}

	function getId_afiliado() {
		return $this->id_afiliado;
	}

	function getTipo_coste() {
		return $this->tipo_coste;
	}

	function getCoste() {
		return $this->coste;
	}

	function getPlataforma_envio() {
		return $this->plataforma_envio;
	}

	function getCoste_envio() {
		return $this->coste_envio;
	}

	function getAsunto() {
		return $this->asunto;
	}

	function getHtml_creatividad() {
		return $this->html_creatividad;
	}

	function getSector() {
		return $this->sector;
	}

	function getAccion() {
		return $this->accion;
	}

	function getTotal() {
		return $this->total;
	}



	function setId($id) {
		$this->id = $id;
	}

	function setFecha_creacion($fecha_creacion) {
		$this->fecha_creacion = $fecha_creacion;
	}

	function setNombre_campanya($nombre_campanya) {
		$this->nombre_campanya = $nombre_campanya;
	}

	function setId_afiliado($id_afiliado) {
		$this->id_afiliado = $id_afiliado;
	}

	function setTipo_coste($tipo_coste) {
		$this->tipo_coste = $tipo_coste;
	}

	function setCoste($coste) {
		$this->coste = $coste;
	}

	function setPlataforma_envio($plataforma_envio) {
		$this->plataforma_envio = $plataforma_envio;
	}

	function setCoste_envio($coste_envio) {
		$this->coste_envio = $coste_envio;
	}

	function setAsunto($asunto) {
		$this->asunto = $asunto;
	}

	function setHtml_creatividad($html_creatividad) {
		$this->html_creatividad = $html_creatividad;
	}

	function setSector($sector) {
		$this->sector = $sector;
	}

	function setAccion($accion) {
		$this->accion = $accion;
	}

	function setTotal($total) {
		$this->total = $total;
	}

}
