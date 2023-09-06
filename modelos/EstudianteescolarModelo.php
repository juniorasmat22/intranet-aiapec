<?php
namespace modelos;

class EstudianteescolarModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_estudianteescolar_crud(?,?,?,?,?,?,?,?)','Estudianteescolar');
	}	
	public function get_estudiante_escolar($estudiante){
		$estudiante->opcion=6;
		return $this->queryObjeto($this->sp,$estudiante);
	}
}
