<?php
namespace modelos;

class EstudiantepreModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_estudiantepre_crud(?,?,?,?,?,?)','Estudiantepre');
	}
	public function get_estudiante_pre($estudiante){
		$estudiante->opcion=6;
		return $this->queryObjeto($this->sp,$estudiante);
	}

	
}
