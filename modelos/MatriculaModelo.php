<?php
namespace modelos;

class MatriculaModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_matricula_crud(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)','Matricula');
	}
	public function get_matriculas_por_estudiante($entidad){
		$entidad->opcion = 7;
        return $this->queryObjects($this->sp, $entidad);
	}
 
}
