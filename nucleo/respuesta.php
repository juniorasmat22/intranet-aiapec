<?php
namespace nucleo;
class Respuesta {
	public $respuesta;//issucces
	public $resultado;//result
	public $mensaje;//message
	public function __construct($respuesta=false,$resultado=null,$mensaje=null){
		$this->respuesta=$respuesta;
		$this->resultado=$resultado;
		$this->mensaje=$mensaje;
	}
}
