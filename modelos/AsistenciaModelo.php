<?php
namespace modelos;

class AsistenciaModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_asistencia_crud(?,?,?,?,?,?,?,?,?,?,?,?,?)','Asistencia');
	}
	public function obtenerAsistencia($objeto){
		$objeto->opcion=7;
		$respuesta=$this->queryObjects($this->sp,$objeto);
		return $respuesta;
	}

	

	
}
